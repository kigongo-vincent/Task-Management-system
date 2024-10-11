const updateImage=()=>{

    console.log("fetch...")

  const image = document.getElementById("files").files[0]

  const imageBox = document.getElementById("imageBox")

  imageBox.style.backgroundImage = `url(${URL.createObjectURL(image)})`

}

const showTask=(task)=>{
  console.log(task)
document.querySelector(".task").innerHTML = task
}

window.addEventListener("load", ()=>{
  const alertComponent = document.querySelector(".alert")

  if(alertComponent){
    alertComponent.classList.add("show")
  }
})