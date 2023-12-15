<section style="margin-top: 1rem;" class="bg-gray-100 p-4 mx-4">
    <h1 style="text-align: center">{{modedsc}}</h1>
</section>

<section style="margin-top: 1rem;" class="container-m row px-4 py-4">
{{with peliculas}}

    <form action="index.php?page=Peliculas_Pelicula&mode={{~mode}}&idPelicula={{id}}" method="POST">

        <label style="margin-bottom: 0.6rem; display: block" for="idpelicula" class="block text-gray-700 text-sm font-bold mb-2">idpelicula</label>
        <input style="margin-bottom: 0.6rem; display: block" type="text" id="idpelicula" name="idpelicula" placeholder="idpelicula de peliculas " value="{{idPelicula}}" {{if ~readonly}} readonly {{endif ~readonly}} class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-blue-400"/>
        {{if idpelicula_error}}<div class="text-red-500 text-sm">{{idpelicula_error}}</div>{{endif idpelicula_error}}


        <label style="margin-bottom: 0.6rem; display: block" for="titulo" class="block text-gray-700 text-sm font-bold mb-2">titulo</label>
        <input style="margin-bottom: 0.6rem; display: block" type="text" id="titulo" name="titulo" placeholder="titulo de peliculas " value="{{titulo}}" {{if ~readonly}} readonly {{endif ~readonly}} class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-blue-400"/>
        {{if titulo_error}}<div class="text-red-500 text-sm">{{titulo_error}}</div>{{endif titulo_error}}


        <label style="margin-bottom: 0.6rem; display: block" for="director" class="block text-gray-700 text-sm font-bold mb-2">director</label>
        <input style="margin-bottom: 0.6rem; display: block" type="text" id="director" name="director" placeholder="director de peliculas " value="{{director}}" {{if ~readonly}} readonly {{endif ~readonly}} class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-blue-400"/>
        {{if director_error}}<div class="text-red-500 text-sm">{{director_error}}</div>{{endif director_error}}


        <label style="margin-bottom: 0.6rem; display: block" for="genero" class="block text-gray-700 text-sm font-bold mb-2">genero</label>
        <input style="margin-bottom: 0.6rem; display: block" type="text" id="genero" name="genero" placeholder="genero de peliculas " value="{{genero}}" {{if ~readonly}} readonly {{endif ~readonly}} class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-blue-400"/>
        {{if genero_error}}<div class="text-red-500 text-sm">{{genero_error}}</div>{{endif genero_error}}


        <label style="margin-bottom: 0.6rem; display: block" for="lanzamiento" class="block text-gray-700 text-sm font-bold mb-2">lanzamiento</label>
        <input style="margin-bottom: 0.6rem; display: block" type="text" id="lanzamiento" name="lanzamiento" placeholder="lanzamiento de peliculas " value="{{lanzamiento}}" {{if ~readonly}} readonly {{endif ~readonly}} class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-blue-400"/>
        {{if lanzamiento_error}}<div class="text-red-500 text-sm">{{lanzamiento_error}}</div>{{endif lanzamiento_error}}


        <label style="margin-bottom: 0.6rem; display: block" for="duracion" class="block text-gray-700 text-sm font-bold mb-2">duracion</label>
        <input style="margin-bottom: 0.6rem; display: block" type="text" id="duracion" name="duracion" placeholder="duracion de peliculas " value="{{duracion}}" {{if ~readonly}} readonly {{endif ~readonly}} class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-blue-400"/>
        {{if duracion_error}}<div class="text-red-500 text-sm">{{duracion_error}}</div>{{endif duracion_error}}


        <label style="margin-bottom: 0.6rem; display: block" for="sinopsis" class="block text-gray-700 text-sm font-bold mb-2">sinopsis</label>
        <input style="margin-bottom: 0.6rem; display: block" type="text" id="sinopsis" name="sinopsis" placeholder="sinopsis de peliculas " value="{{sinopsis}}" {{if ~readonly}} readonly {{endif ~readonly}} class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-blue-400"/>
        {{if sinopsis_error}}<div class="text-red-500 text-sm">{{sinopsis_error}}</div>{{endif sinopsis_error}}


        <label style="margin-bottom: 0.6rem; display: block" for="clasificacion" class="block text-gray-700 text-sm font-bold mb-2">clasificacion</label>
        <input style="margin-bottom: 0.6rem; display: block" type="text" id="clasificacion" name="clasificacion" placeholder="clasificacion de peliculas " value="{{clasificacion}}" {{if ~readonly}} readonly {{endif ~readonly}} class="w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:border-blue-400"/>
        {{if clasificacion_error}}<div class="text-red-500 text-sm">{{clasificacion_error}}</div>{{endif clasificacion_error}}


        {{if ~showConfirm}}
            <button type="submit" name="btnConfirm">Confirmar</button>&nbsp;
        {{endif ~showConfirm}}
        <button id="btnCancel">Cancelar</button>

    </form>
{{endwith peliculas}}
</section>
<script>
    document.addEventListener("DOMContentLoaded", ()=>{
        document.getElementById("btnCancel").addEventListener("click", (e)=>{
            e.preventDefault();
            e.stopPropagation();
            document.location.assign("index.php?page=Peliculas_Peliculas");
        });
    });
</script>