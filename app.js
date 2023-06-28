


let frmCamper = document.querySelector('#formCamper');
if(frmCamper){
    let myHeaders = new Headers({'Content-Type':'application/json'});

    frmCamper.addEventListener('submit', async (e)=>{
        
        let data = Object.fromEntries(new FormData(frmCamper));
     
       
        console.log(data);
        let config ={
            method: "POST",
            headers: myHeaders,
            body: JSON.stringify(data)
        };
      
        
        await fetch('../controllers/campers/insert_camper.php',config);
        e. preventDefault(); 
        alert('hola')
    });
    

}



document.querySelectorAll(".ElminarCamper").forEach(element =>{

    let myHeader =  new Headers({"Content-Type": "json/application"});
    let config = {
        method: 'GET',
        headers: myHeader,
    };
    element.addEventListener("click", async(e)=>{
        console.log(e.target.id);
        let id = e.target.id;
        await fetch (`../controllers/campers/del_camper.php?id=${id}`,config)

    })
})

