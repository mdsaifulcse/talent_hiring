<div class="card-block groups-contact">
    <h4>About {{$user->name}}</h4>
    <ul class="list-group">
        <li class="list-group-item justify-content-between">
            Name
            <span class="badge badge-default badge-md badge-pill">{{$user->name}}</span>
        </li>
        <li class="list-group-item justify-content-between">
            Email
            <span class="badge badge-default badge-md badge-pill">{{$user->email}}</span>
        </li>
        <li class="list-group-item justify-content-between">
            Phone
            <span class="badge badge-default badge-md badge-pill">{{$user->phone}}</span>
        </li>
        <li class="list-group-item justify-content-between">
            Status
            <span class="badge badge-default badge-md badge-pill">{{$user->approval_status}}</span>
        </li>
    </ul>
</div>