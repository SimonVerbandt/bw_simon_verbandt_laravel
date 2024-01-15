<div class="article">
    <a class="text-gray-600 hover:text-gray-900"  href="{{$url}}" id="url"><h2>{{$title}}</h2></a>
    <div class="flex-container">

        <img src="{{$image}}" alt="{{$title}}">
        <p id="text">{{$abstract}}</p>
    </div>
    <p id="date">{{$published_at}}</p>
</div>
<style>
   p{
       color: black;
       flex-wrap: wrap;
   }
    #text{
         width: 35rem;
         justify-self: flex-end;
         align-self: center;
    }
    #url{
        font-size: 2rem;
        text-decoration: none;
    }
    #url:hover{
        border-bottom: 0.5px solid black;
    }
    .flex-container{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
   img{
       width: 25rem;
         height: 15rem;
         margin: 2rem;
         align-self: flex-start;
   }
    .article{
        width: 70rem;
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: space-between;
         margin: 3rem;
         padding: 2rem;
         border-bottom: 1px solid black;
    }
    #date{
        margin-top: 2rem;
        align-self: flex-end;
    }
</style>
