"use strict";

//このjsを発火させるためのbutton
let submit = document.getElementById("submit__button");

//それぞれのラジオボタンを取得して配列にいれる
let basic_1 = document.getElementsByName("basic_1");
let basic_2 = document.getElementsByName("basic_2");
let basic_3 = document.getElementsByName("basic_3");
let basic_4 = document.getElementsByName("basic_4");
let character_1 = document.getElementsByName("character_1");
let character_2 = document.getElementsByName("character_2");
let character_3 = document.getElementsByName("character_3");
let character_4 = document.getElementsByName("character_4");
let character_5 = document.getElementsByName("character_5");
let character_6 = document.getElementsByName("character_6");
let character_7 = document.getElementsByName("character_7");
let job_1 = document.getElementsByName("job_1");
let job_2 = document.getElementsByName("job_2");
let job_3 = document.getElementsByName("job_3");
let job_4 = document.getElementsByName("job_4");
let job_5 = document.getElementsByName("job_5");
let job_6 = document.getElementsByName("job_6");
let job_7 = document.getElementsByName("job_7");

// それぞれのラジオボタンの位置を代入するための変数
// 1がそう思う      5がそう思わない
let answer_basic_1 = 0;
let answer_basic_2 = 0;
let answer_basic_3 = 0;
let answer_basic_4 = 0;
let answer_character_1 = 0;
let answer_character_2 = 0;
let answer_character_3 = 0;
let answer_character_4 = 0;
let answer_character_5 = 0;
let answer_character_6 = 0;
let answer_character_7 = 0;
let answer_job_1 = 0;
let answer_job_2 = 0;
let answer_job_3 = 0;
let answer_job_4 = 0;
let answer_job_5 = 0;
let answer_job_6 = 0;
let answer_job_7 = 0;

function check_basic_1() {
  for (let i = 0; i < 4; i++) {
    if (basic_1[i].checked) {
      answer_basic_1 += i + 1;
    }
  }
  console.log(answer_basic_1);
}
function check_basic_2() {
  for (let i = 0; i < 2; i++) {
    if (basic_2[i].checked) {
      answer_basic_2 += i + 1;
    }
  }
  console.log(answer_basic_2);
}
function check_basic_3() {
  for (let i = 0; i < 3; i++) {
    if (basic_3[i].checked) {
      answer_basic_3 += i + 1;
    }
  }
  console.log(answer_basic_3);
}
function check_basic_4() {
  for (let i = 0; i < 3; i++) {
    if (basic_4[i].checked) {
      answer_basic_4 += i + 1;
    }
  }
  console.log(answer_basic_4);
}
function check_character_1() {
  for (let i = 0; i < 5; i++) {
    if (character_1[i].checked) {
      answer_character_1 += i + 1;
    }
  }
  console.log(answer_character_1);
}
function check_character_2() {
  for (let i = 0; i < 5; i++) {
    if (character_2[i].checked) {
      answer_character_2 += i + 1;
    }
  }
  console.log(answer_character_2);
}
function check_character_3() {
  for (let i = 0; i < 5; i++) {
    if (character_3[i].checked) {
      answer_character_3 += i + 1;
    }
  }
  console.log(answer_character_3);
}
function check_character_4() {
  for (let i = 0; i < 5; i++) {
    if (character_4[i].checked) {
      answer_character_4 += i + 1;
    }
  }
  console.log(answer_character_4);
}
function check_character_5() {
  for (let i = 0; i < 5; i++) {
    if (character_5[i].checked) {
      answer_character_5 += i + 1;
    }
  }
  console.log(answer_character_5);
}
function check_character_6() {
  for (let i = 0; i < 5; i++) {
    if (character_6[i].checked) {
      answer_character_6 += i + 1;
    }
  }
  console.log(answer_character_6);
}
function check_character_7() {
  for (let i = 0; i < 5; i++) {
    if (character_7[i].checked) {
      answer_character_7 += i + 1;
    }
  }
  console.log(answer_character_7);
}
function check_job_1() {
  for (let i = 0; i < 5; i++) {
    if (job_1[i].checked) {
      answer_job_1 += i + 1;
    }
  }
  console.log(answer_job_1);
}
function check_job_2() {
  for (let i = 0; i < 5; i++) {
    if (job_2[i].checked) {
      answer_job_2 += i + 1;
    }
  }
  console.log(answer_job_2);
}
function check_job_3() {
  for (let i = 0; i < 5; i++) {
    if (job_3[i].checked) {
      answer_job_3 += i + 1;
    }
  }
  console.log(answer_job_3);
}
function check_job_4() {
  for (let i = 0; i < 5; i++) {
    if (job_4[i].checked) {
      answer_job_4 += i + 1;
    }
  }
  console.log(answer_job_4);
}
function check_job_5() {
  for (let i = 0; i < 5; i++) {
    if (job_5[i].checked) {
      answer_job_5 += i + 1;
    }
  }
  console.log(answer_job_5);
}
function check_job_6() {
  for (let i = 0; i < 5; i++) {
    if (job_6[i].checked) {
      answer_job_6 += i + 1;
    }
  }
  console.log(answer_job_6);
}
function check_job_7() {
  for (let i = 0; i < 5; i++) {
    if (job_7[i].checked) {
      answer_job_7 += i + 1;
    }
  }
  console.log(answer_job_7);
}

//ここで発火
submit.addEventListener("click", checks);

// それぞれの点数を求める
function checks() {
  check_basic_1();
  check_basic_2();
  check_basic_3();
  check_basic_4();
  check_character_1();
  check_character_2();
  check_character_3();
  check_character_4();
  check_character_5();
  check_character_6();
  check_character_7();
  check_job_1();
  check_job_2();
  check_job_3();
  check_job_4();
  check_job_5();
  check_job_6();
  check_job_7();
}
