window.addEventListener("load", ()=>{
  btnCancel = document.getElementById("btnCancel");
  btnCancel.addEventListener("click", ()=>{
    console.log(document.getElementById('from').value);
    location.href = document.getElementById('from').value;
  });
})