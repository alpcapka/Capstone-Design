const moment = require('moment');

function formatMessage(username, text) {
  return {
    username,   //메시지 창에서 이름표시
    text,
    time: moment().format('h:mm a')
  };
}

module.exports = formatMessage;

//타임 모듈