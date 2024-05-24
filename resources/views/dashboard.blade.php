<x-app-layout>


    <div class="py-12 bg-hackerBg min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-hackerBg border border-hackerPurple shadow-xl sm:rounded-lg p-6">
                <h1 class="text-hackerPurple font-hacker text-5xl lg:text-7xl font-bold mb-4 animate-pulse">
                    Hello, {{ Auth::user()->name }}!
                </h1>

                <p class="text-hackerPurple font-hacker text-5xl lg:text-3xl font-bold mb-4 animate-pulse">
                    Fundación y Misión
La Escuela de Programación Lareduca fue fundada en 2015 por Santiago Samuel Benítez Álvarez, un apasionado de la tecnología y la educación. Su visión era crear un lugar donde los estudiantes pudieran aprender las habilidades necesarias para prosperar en el mundo digital. La misión de Lareduca es empoderar a los estudiantes con el conocimiento y las herramientas necesarias para convertirse en innovadores en el campo de la programación y la informática.

Primeros Años
Durante los primeros años, Lareduca comenzó como un pequeño proyecto comunitario en una ciudad pequeña. Las clases se impartían en un aula modesta con equipos donados por empresas locales y exalumnos agradecidos. La oferta inicial incluía cursos básicos de programación, desarrollo web y fundamentos de informática.

Expansión y Crecimiento
En 2017, gracias a la calidad de sus programas y la dedicación de sus instructores, Lareduca comenzó a ganar reconocimiento. Las inscripciones aumentaron y la escuela obtuvo financiación para expandir sus instalaciones y mejorar sus recursos tecnológicos. Se introdujeron nuevos cursos avanzados en áreas como inteligencia artificial, desarrollo de videojuegos y ciberseguridad.

Innovación y Tecnología
En 2019, Lareduca implementó una plataforma de aprendizaje en línea, permitiendo a estudiantes de todo el mundo acceder a sus cursos. Esta innovación fue crucial durante la pandemia de COVID-19 en 2020, cuando la escuela pudo continuar sus operaciones sin interrupciones, adaptándose rápidamente a las necesidades de enseñanza remota.

Comunidad y Alianzas
A lo largo de los años, Lareduca ha forjado alianzas estratégicas con empresas tecnológicas líderes, universidades y organizaciones sin fines de lucro. Estas asociaciones han proporcionado a los estudiantes oportunidades de prácticas, mentoría y empleo. La escuela también organiza hackatones, competencias de programación y talleres con expertos de la industria.

Logros y Reconocimientos
Hoy en día, Lareduca es reconocida como una de las principales escuelas de programación de la región. Ha formado a miles de estudiantes, muchos de los cuales han pasado a trabajar en empresas tecnológicas prominentes o han fundado sus propias startups. La escuela ha recibido varios premios por su excelencia educativa y su contribución a la comunidad tecnológica.

                </p>
            </div>
        </div>
    </div>
</x-app-layout>
