<section>
    <h2 style="text-align: center">LISTADO DE PELICULAS</h2>
</section>
<section class="WWList">
    <table class="center">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">IDPELICULA</th>
                <th class="py-2 px-4 border-b">TITULO</th>
                <th class="py-2 px-4 border-b">DIRECTOR</th>
                <th class="py-2 px-4 border-b">GENERO</th>
                <th class="py-2 px-4 border-b">LANZAMIENTO</th>
                <th class="py-2 px-4 border-b">DURACION</th>
                <th class="py-2 px-4 border-b">SINOPSIS</th>
                <th class="py-2 px-4 border-b">CLASIFICACION</th>
                <th><a href="index.php?page=Peliculas_Pelicula&mode=INS">Nuevo</a></th>
            </tr>
        </thead>
        <tbody>
        {{foreach peliculas}}
            <tr>
                <td class="p-2 text-center">{{idPelicula}}</a></td>
                <td class="p-2 text-center">
                    <a class="text-blue-500 hover:text-blue-700" href="index.php?page=Peliculas_Pelicula&mode=DSP&idPelicula={{idPelicula}}">{{titulo}}</a>
                </td>
                <td>{{director}}</a></td>
                <td>{{genero}}</a></td>
                <td>{{lanzamiento}}</a></td>
                <td>{{duracion}}</a></td>
                <td>{{sinopsis}}</a></td>
                <td>{{clasificacion}}</a></td>
                <td>
                    <a class="text-green-500 hover:text-green-700" href="index.php?page=Peliculas_Pelicula&mode=UPD&idPelicula={{idPelicula}}">Editar - </a>
                    <a class="text-red-500 hover:text-red-700" href="index.php?page=Peliculas_Pelicula&mode=DEL&idPelicula={{idPelicula}}">Borrar</a>
                </td>
            </tr>
     {{endfor peliculas}}
        </tbody>
    </table>
</section>