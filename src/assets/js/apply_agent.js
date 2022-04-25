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
    `企業名：${formElements.name.value}`,
    "属性：" + typeof `${formElements.name.value}`
  );
  console.log(
    `URL（企業HP）：${formElements.url.value}`,
    "属性：" + typeof `${formElements.url.value}`
  );
  console.log(
    `代表者様氏名（漢字）：${formElements.name__kanji.value}`,
    "属性：" + typeof `${formElements.name__kanji.value}`
  );
  console.log(
    `代表者様姉妹（フリガナ）：${formElements.name__kana.value}`,
    "属性：" + typeof `${formElements.name__kana.value}`
  );
  console.log(
    `メールアドレス：${formElements.email.value}`,
    "属性：" + typeof `${formElements.email.value}`
  );
  console.log(
    `電話番号：${formElements.tel.value}`,
    "属性：" + typeof `${formElements.tel.value}`
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
