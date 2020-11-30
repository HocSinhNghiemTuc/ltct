<ul>
    @foreach($contacts as $contact)
        <li><a href="{{$contact['contact_value']}}"><i class="{{$contact['icon']}}"
                                                       aria-hidden="true"></i></a></li>
    @endforeach
</ul>
