const grid = new Muuri('.grid', {
    layout: {
        rounding: false
    },
});

window.addEventListener('load', () => {
    grid.refreshItems().layout();
    document.getElementById('grid').classList.add('imagens-ready');


    //AGREGAMOS LOS LISTENERS PARA EL FILTRADO POR CATEGORIA
    const links = document.querySelectorAll('#categories a');
    links.forEach((element) => {
        element.addEventListener('click', (event) => {
            event.preventDefault();
            links.forEach((link) => link.classList.remove('active'));
            event.target.classList.add('active');

            const category = event.target.innerHTML.toUpperCase();
            category === 'TODOS' ? grid.filter('[data-category]') : grid.filter(`[data-category="${category}"]`);
        })
    })


    //AGREGAR UN LISTENER PARA EL OVERLAY
    const overlay = document.getElementById('overlay');
    document.querySelectorAll('.grid .item img').forEach((element) => {


        element.addEventListener('click', () => {
            const route = element.getAttribute('src');
            const description = element.parentNode.parentNode.dataset.description;
            overlay.classList.add('active');
            document.querySelector('#overlay img').src = route;
            document.querySelector('#overlay .description').innerHTML = description;
        })
    })

    //EVENTLISTENER DEL BOTON DE CERRAR
    document.querySelector('#btn-close-popup').addEventListener('click', () => {
        overlay.classList.remove('active');
    });

    overlay.addEventListener('click', (event) => {
        event.target.id === 'overlay' ? overlay.classList.remove('active') : '';
    });
});