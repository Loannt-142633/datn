<table class="table table-bordered table-striped table-hover table-reponsive scroll datatables">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th>@lang('custom.common.name')</th>
            <th>@lang('custom.common.email')</th>
            <th>@lang('custom.common.phone')</th>
            <th>@lang('custom.common.tasks')</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>
                {{ $loop->index+1 }}
            </td>
            
            <td>
                {!! Html::image(
                    config('custom.path_avatar') . $user->avatar,
                    'User Image',
                    [
                        'width' => '25px',
                        'height' => '25px',
                    ]
                ) !!}
            </td>
            <td>
                {!! Html::linkRoute(
                    'member.show',
                    $user->name,
                    [
                        'id' => $user->id,
                    ],
                    [
                        'style' => 'color: black; text-decoration: underline;',
                    ]
                ) !!}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                {{ $user->phone }}
            </td>
            <td>
                @if ($user->tasks)
                    <ul>
                        @foreach ($user->tasks as $task)
                            <li style="list-style: none">
                                {{$task->text . ' (' . ($task->progress)*100 . '%)'}}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th>@lang('custom.common.name')</th>
            <th>@lang('custom.common.email')</th>
            <th>@lang('custom.common.phone')</th>
            <th>@lang('custom.common.tasks')</th>
        </tr>
    </tfoot>
</table> 