const navSlide = ()=> {
    const mini =document.querySelector('.mini');
    const nav =document.querySelector('.nav-links');
    const navLink =document.querySelectorAll('.nav-links li');
    //toggle nav
    mini.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');
        //animate links
        navLink.forEach((link,index)=>{
            console.log(index);
            if(link.style.animation){
                link.style.animation='';
            }
            else {
                link.style.animation = `navLinkFade 0.5 ease forwards ${index / 7 + 2}s`;
            }
        });
        //mini animation
        mini.classList.toggle('toggle');
    });

}
navSlide();