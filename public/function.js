document.addEventListener("DOMContentLoaded", function() {
    
    const btnDesplegarSectionActividad = document.getElementById('btnDesplegarSectionActividad');

    btnDesplegarSectionActividad.addEventListener('click', function(){
        const sectionActividad = document.getElementById('sectionActividad');
        if(sectionActividad.style.display == 'none') {
            sectionActividad.style.display = 'block';
        } else {
            sectionActividad.style.display = 'none';
        }
        moveToFinal();
    });

    function moveToFinal() {
        window.scrollTo(0, document.body.scrollHeight);
    }
    
});