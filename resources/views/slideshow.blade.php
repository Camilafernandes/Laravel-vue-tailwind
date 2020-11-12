<!DOCTYPE html>
<html>
   <head>
    <title>Tailwind CSS Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> 

		<style>
			.carousel-open:checked + .carousel-item {
				position: static;
				opacity: 100;
			}
			.carousel-item {
				-webkit-transition: opacity 0.6s ease-out;
				transition: opacity 0.6s ease-out;
			}
			#carousel-1:checked ~ .control-1,
			#carousel-2:checked ~ .control-2,
			#carousel-3:checked ~ .control-3,
            #carousel-4:checked ~ .control-4 {
				display: block;
			}
			#bt-carrousel {

				bottom: 2%;
				left: 0;
				right: 0;
				text-align: center;
				z-index: 10;
			}
            #bt-carrousel:hover{
                border-bottom: solid 4px rgba(155,44,44,var(--bg-opacity));
            }
            #bt-carrousel:focus{
                border: none;
                outline: none;
            }

            #bt-carrousel:visited, #bt-carrousel:active{
                border: none;
            }
		</style>

</head>

<body class="bg-white font-sans leading-normal tracking-normal">

<div class="carousel relative shadow-2xl bg-white">
	<div class="carousel-inner relative overflow-hidden w-full">
	  <!--Slide 1-->
		<input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
		<div class="control-1 hidden carousel-item absolute opacity-0 " style="height:85vh;">
            <div class="h-full bg-local bg-center w-4/12 float-left" style="background-image: url('/images/slideshow1.jpeg'); background-size: cover;">
            </div>
            <div class="block h-full w-8/12 bg-white  text-left px-10 float-left">
                <p class="font-bold text-black text-6xl mt-10 pb-0"> LOREM IPSUM ?</p> 
                <p class="font-thin text-gray-300 text-4xl pt-2"> Simply dummy text of the printing and typesetting industry </p> 
                <div class="block max-h-full w-8/12 bg-white  text-left">
                    <p class="font-bold text-black text-3xl mt-10 pb-5"> 
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et erat in sapien venenatis posuere ac rutrum nulla. 
                    </p> 
                    <p class="font-thin text-black text-3xl pt-2"> Nulla non elit vel neque consectetur hendrerit </p> 
                </div>
                <button id="bt-carrousel" class="control-1 float-right mt-32 text-white bg-red-700 py-2 px-4 mr-10 rounded focus:border-transparent"> 
                    <label for="carousel-2" class="next control-1 border-transparent">próximo</label>
                </button>
            </div>            
		</div>
        
		
		<!--Slide 2-->
		<input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
		<div id="carousel-2" class="control-2 hidden carousel-item absolute opacity-0" style="height:85vh; background-image: url('/images/slideshow1.jpeg'); background-size: cover;">
			<div class="block h-full w-8/12  text-white text-5xl text-left" >
                <p class="font-bold text-white text-5xl pl-10" style="padding-top: 65%;"> WHY DO WE USE IT?</p> 
                <p class="font-thin text-white text-3xl pt-2 pl-10"> 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et erat in sapien venenatis posuere ac rutrum nulla.
                </p> 
            </div>
            <button id="bt-carrousel" class="control-2 float-right text-white bg-red-700 py-2 px-4 mr-20 rounded focus:border-transparent -mt-16"> 
                <label for="carousel-3" class="next control-2 border-transparent">próximo</label>
            </button>
		</div>
        
		
		<!--Slide 3-->
		<input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
        <div class="control-3 hidden carousel-item absolute opacity-0"  style="height:85vh; background-image: url('/images/slideshow1.jpeg'); background-size: cover;">
			<div class="block h-full w-12/12  text-white text-5xl text-right" style="padding-top:30%">
                <p class="font-bold text-white text-5xl pr-10"> WHERE DOES IT COME FROM?</p> 
                <p class="font-thin text-white text-3xl pt-2 pr-10" > 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p> 
            </div>
            <button id="bt-carrousel" class="control-2 float-right text-white bg-red-700 py-2 px-4 mr-20 rounded focus:border-transparent -mt-16"> 
                <label for="carousel-4" class="next control-3 border-transparent">próximo</label>
            </button>
		</div>

        <!--Slide 4-->
		<input class="carousel-open" type="radio" id="carousel-4" name="carousel" aria-hidden="true" hidden="">
        <div class="control-4 hidden carousel-item absolute opacity-0" style="height:85vh;">
            <div class="bg-local bg-center w-full text-left" style="height: 40vh; background-image: url('/images/slideshow1.jpeg'); background-size: cover;">
                <p class="font-bold text-white text-6xl pl-10 pt-5"> LOREM IPSUM ?</p> 
                <p class="font-thin text-white text-4xl pt-2 pl-10"> Simply dummy text of the printing and typesetting industry </p> 
            </div>
            <div class="block h-20 bg-white  w-full text-left px-10">
                <div class="block max-h-full w-8/12 bg-white  text-left">
                    <p class="font-normal text-black text-3xl mt-10 pb-5"> 
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et erat in sapien venenatis posuere ac rutrum nulla. 
                    </p> 
                    <p class="font-normal text-black text-3xl pt-2"> Nulla non elit vel neque consectetur hendrerit </p> 
                </div>
                <button id="bt-carrousel" class="control-4 float-right text-white bg-red-700 py-2 px-4 mr-20 rounded focus:border-transparent mt-56"> 
                    <label for="carousel-1" class="next control-4 border-transparent">próximo</label>
                </button>
            </div>
		</div>
        
		<!-- Add additional indicators for each slide-->
	</div>
</div>

</html>