const path = require('path');
const http = require('http');
const express = require('express');
const socketio = require('socket.io');
const formatMessage = require('./utils/messages');  //시간
const {
  userJoin,
  getCurrentUser,
  userLeave,
  getRoomUsers
} = require('./utils/users');

const app = express();
const server = http.createServer(app);
const io = socketio(server);

var count = 1;
// Set static folder
app.use(express.static(path.join(__dirname, 'public')));  //PUBLIC 폴더 연결

const botName = '채팅 봇 ';  //봇 이름

// Run when client connects
io.on('connection', socket => {
  console.log("익명"+count+"연결");
  var name = "익명" + count++ +" ";   //채팅창 유저이름
  socket.on('joinRoom', ({ named, room }) => {   //main.js joinRoom에서 메시지 보냄
    
    const user = userJoin(socket.id, name, room); 
    
    socket.join(user.room);



    // Welcome current user
    socket.emit('message', formatMessage(botName, '환영합니다!'));   //접속했을 때 
   
    // Broadcast when a user connects
    socket.broadcast
      .to(user.room)
      .emit(
        'message',
        formatMessage(botName, `${user.username} 님이 입장하였습니다.`)  //다른사람이 접속했을 때
      );

    // Send users and room info
    io.to(user.room).emit('roomUsers', {
      room: user.room,    // 채팅방 이름
      users: getRoomUsers(user.room)    //유저 목록
    });
  });

  // Listen for chatMessage
  socket.on('chatMessage', msg => {
    const user = getCurrentUser(socket.id);

    io.to(user.room).emit('message', formatMessage(user.username, msg));    //채팅창 메시지 기록?
  });

  // Runs when client disconnects
  socket.on('disconnect', () => {
    const user = userLeave(socket.id); 

    if (user) {
      io.to(user.room).emit(
        'message',
        formatMessage(botName, `${user.username} 님이 퇴장하였습니다.`)  //유저 떠났을 때 메시지
      );

      // Send users and room info
      io.to(user.room).emit('roomUsers', {
        room: user.room,
        users: getRoomUsers(user.room)  //유저 떠났을 때 목록 관리
      });
    }
  });
});

const PORT = process.env.PORT || 3000;

server.listen(PORT, () => console.log(`Server running on port ${PORT}`));   // 실행 시 
