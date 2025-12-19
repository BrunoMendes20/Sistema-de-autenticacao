setTimeout(()=>{

    const messages = document.querySelectorAll('.auto-close');

    messages.forEach(message => {
                message.classList.remove('show');
                message.classList.add('fade');

                // Wait for the fade-out transition to complete before removing the element
                setTimeout(() => {
                    message.remove();
                }, 500);
            }); 
     }, 3000);

  
  
        