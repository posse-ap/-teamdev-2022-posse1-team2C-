function changeForm(e) {
  const next__apply =
    e.target.parentNode.parentNode.parentNode.nextElementSibling;

  // すべてのSTEPを非表示
  document
    .querySelectorAll('[role="apply"]')
    .forEach((p) => p.setAttribute("hidden", true));

  // 次のSTEPを表示
  next__apply.removeAttribute("hidden");

  // consoleに出力
  const formElements = document.forms.apply__form;
  console.log(
    `お問い合わせ先エージェント企業：${formElements.agent.value}`,
    "属性：" + typeof `${formElements.agent.value}`
  );
  console.log(
    `お名前（漢字）：${formElements.name__kanji.value}`,
    "属性：" + typeof `${formElements.name__kanji.value}`
  );
  console.log(
    `お名前（フリガナ）：${formElements.name__kana.value}`,
    "属性：" + typeof `${formElements.name__kana.value}`
  );
  console.log(
    `メールアドレス：${formElements.email.value}`,
    "属性：" + typeof `${formElements.email.value}`
  );
  console.log(
    `電話番号：${formElements.tel.value}`,
    "属性：" + typeof Number(`${formElements.tel.value}`)
  );
  console.log(
    `郵便番号：${formElements.postcode.value}`,
    "属性：" + typeof `${formElements.postcode.value}`
  );
  console.log(
    `住所：${formElements.address.value}`,
    "属性：" + typeof `${formElements.address.value}`
  );
  console.log(
    `生年月日：${formElements.birth.value}`,
    "属性：" + typeof Number(`${formElements.birth.value}`)
  );
  console.log(
    `大学：${formElements.university.value}`,
    "属性：" + typeof `${formElements.university.value}`
  );
  console.log(
    `学部：${formElements.faculty.value}`,
    "属性：" + typeof `${formElements.faculty.value}`
  );
  console.log(
    `学科：${formElements.course.value}`,
    "属性：" + typeof `${formElements.course.value}`
  );
  console.log(
    `卒業年度：${formElements.graduate.value}`,
    "属性：" + typeof Number(`${formElements.graduate.value}`)
  );
  console.log(
    `その他自由記述欄：${formElements.content.value}`,
    "属性：" + typeof `${formElements.content.value}`
  );
}

document.querySelectorAll('[role="submit"]').forEach((element) => {
  element.addEventListener(
    "click",
    function (t) {
      t.preventDefault();
      changeForm(t);
    },
    false
  );
});
