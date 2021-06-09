const chatForm = document.getElementById('chat-form');  //프론트부분이랑 연결
const chatMessages = document.querySelector('.chat-messages');
const roomName = document.getElementById('room-name');
const userList = document.getElementById('users');


// Get username and room from URL
const { username, room } = Qs.parse(location.search, {
  ignoreQueryPrefix: true,
});

const socket = io();
var count = 1;
var named = "익명" + count;
// Join chatroom
socket.emit('joinRoom', { named, room });  //server.js에 메시지 보냄 //username->named로 변경

// Get room and users
socket.on('roomUsers', ({ room, users }) => {
  outputRoomName(room);
  outputUsers(users);
});

// Message from server
socket.on('message', (message) => {
  console.log(message);
  outputMessage(message);

  // Scroll down
  chatMessages.scrollTop = chatMessages.scrollHeight;   // 입력시 스크롤 자동내림
});

// Message submit
chatForm.addEventListener('submit', (e) => {  //chatForm에 이벤트를 걸어줌 submit이벤트가 발생시
  e.preventDefault();

  // Get message text
  let msg = e.target.elements.msg.value;

  msg = msg.trim();

  if (!msg) {
    return false;
  }

  // Emit message to server
  socket.emit('chatMessage', msg);

  // Clear input
  e.target.elements.msg.value = '';
  e.target.elements.msg.focus();
});

// Output message to DOM
function outputMessage(message) {
  const div = document.createElement('div');
  div.classList.add('message');
  const p = document.createElement('p');
  p.classList.add('meta');
  p.innerText = message.username;
  p.innerHTML += `<span>${message.time}</span>`;    //시간 메시지 부분 색
  div.appendChild(p);
  const para = document.createElement('p');
  para.classList.add('text');
  para.innerText = message.text;
  div.appendChild(para);
  document.querySelector('.chat-messages').appendChild(div);
}

// Add room name to DOM
function outputRoomName(room) {   //room 이름 출력
  roomName.innerText = room;
}

// Add users to DOM
function outputUsers(users) {
  userList.innerHTML = '';
  users.forEach((user) => {
    const li = document.createElement('li');
    li.innerText = user.username;
    userList.appendChild(li);
  });
}

//Prompt the user before leave chat room // chat.html에 있는 leave room클릭 시 index.html로 이동
document.getElementById('leave-btn').addEventListener('click', () => {    //채팅방 나갈시 이벤트 발생   버튼 클릭시 메시지와 퇴장
  const leaveRoom = confirm('채팅방을 나가시겠습니까?');
  if (leaveRoom) {                                                        //방을 떠날시 인덱스.html로 이동
    window.location = '../index.html';
  } else {
  }
});

