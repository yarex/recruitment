@extends('base')

@section('title', "Projects")


@section('content')

<div class="container">
    <div class="row">
        <div class="col-2">
            Wyświetl projekty: 
        </div>
        <div class="col-2">
            <select>
                <option value="" selected>Wszystkie</option>
                <option value="0">Nieaktywne</option>
                <option value="1">Aktywne</option>
                <option value="2">W trakcie realizacji</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table>
                <thead>
                    <tr>
                        <th>Nazwa projektu</th>
                        <th>Adres strony</th>
                        <th>Aktywność projektu</th>
                        <th>Nazwa grupy projektu</th>
                        <th>Nazwa kampanii</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        @foreach($project->groups as $group)
                            @foreach($group->campaigns as $campaign)
                            <tr>
                                <td>{{ $project->name ?? null }}</td>
                                <td>{{ $project->website ?? null}}</td>
                                <td>
                                    @if($project->active === 0)
                                    nieaktywny
                                    @elseif ($project->active === 1)
                                    aktywny
                                    @elseif ($project->active === 2)
                                    w trakcie realizacji
                                    @endif
                                </td>
                                
                                <td>{{ $group->name ?? null }}</td>
                                <td >{{ $campaign->name ?? null }}</td>
                                                    
                                {{-- Buttons --}}
                                <td>
                                    <a href="/projects/{{ $campaign->id }}">
                                        <button class="btn btn-block btn-primary">Zobacz</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="/projects/{{ $campaign->id }}/edit">
                                        <button class="btn btn-block btn-warning">Edytuj</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="/projects/{{ $campaign->id }}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-block btn-danger">Usuń</button>
                                    </form>
                                </td>
                                {{-- End Buttons --}}

                            </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            {{ $projects->links() }}

        </div>
    </div>
</div>



@endsection