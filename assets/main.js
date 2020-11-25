function getUserByOrder() {

    $.ajax({
        type: 'POST',
        url: 'http://localhost/DB_VIDEOGAME/facade/user_facade.php?action=select',
        data: {}
    }).done(function (data) {



        var arrayTotal = data.split("<br>");

        //reviso si ya se ha creado una tabla, y si se ha creado la borro
        if (document.getElementsByClassName("fila").length != 0) {
            document.querySelectorAll('.fila').forEach(function (a) {
                a.remove()
            })
        }


        for (let fila = 0; fila < arrayTotal.length; fila++) {



            //obtengo los valores
            data = arrayTotal[fila].split(":");
            
            var node = document.createElement("tr");
            node.className = "fila";

            for (let column = 0; column < data.length; column++) {

                //inserto id
                var id = document.createElement("td");
                id.innerHTML = data[column]
                node.appendChild(id);

            }

            //añado color
            if (fila % 2 == 0) {
                node.style.backgroundColor = "rgb(107, 22, 187)";
                node.style.color = "white";
            }
            //agrego el tr a la tabala
            document.getElementById("myList").appendChild(node);

        }
    })

}
