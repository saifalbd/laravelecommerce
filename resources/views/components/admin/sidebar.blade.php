 <div class="sidebar">
     <ul>


         @foreach($menus as $menu)
             <li><a href="{{ $menu['url'] }}">{{ $menu['title'] }}</a>
             </li>
         @endforeach
     </ul>
 </div>
