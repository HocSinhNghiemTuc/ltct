<div class="row">
    <div class="col-sm-6">
        <div class="contactinfo">
            <ul class="nav nav-pills">
                @foreach($contacts as $contact)
                    @if($contact['show?'] == true)
                        <li>
                            <a href="#">
                                <i class="{{$contact['icon']}}">{{$contact['contact_value']}}</i>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="social-icons pull-right">
            <ul class="nav navbar-nav">
                @foreach($contacts as $contact)
                    @if($contact['show?'] == false)
                        <li>
                            <a href="{{$contact['contact_value']}}">
                                <i onmouseover="this.style.color='{{$contact['color']}}';"
                                   onmouseout="this.style.color='';" class="{{$contact['icon']}}"
                                   aria-hidden="true"></i>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
