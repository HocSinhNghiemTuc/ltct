<ul class="nav navbar-nav">
    @foreach($contacts as $contact)
        <li>
            <a href="{{$contact['contact_value']}}">
                <i onmouseover="this.style.color='{{$contact['color']}}';" onmouseout="this.style.color='';" class="{{$contact['icon']}}" aria-hidden="true"></i>
            </a>
        </li>
    @endforeach
</ul>
