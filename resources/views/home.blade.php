<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta
        http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Todo List</title>
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" /> <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
    </head>
<body class="bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
            <h3 class="fw-boldgit ">To-do List</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf
                    <div class="input-group">
                        <input type="text" name="task" class="form-control" placeholder="Add your new todo">
                        <input type="number" name="is_done" value="0" hidden>
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fa fa-plus"></i></button>
                    </div>
                </form>
                {{-- if tasks count --}}
                @if (count($todolist))
                    <ul class="list-group list-group-flush mt-3">
                        <h6 class="mt-1 fw-bold">Undone</h6>
                            @foreach ($todolist as $item)
                                @if ($item->is_done == 0)
                                    <li class="list-group-item">
                                        <form action="{{route('destroy', $item->id)}}" method="POST">
                                            {{$item->task}}
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link btn-sm float-end"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <form action="{{route('update', $item->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                                <button type="submit" class="btn btn-link btn-sm float-end mt-n4" title="Click to mark as done"><i class="far fa-circle"></i></button>
                                        </form>
                                    </li>  
                                @endif
                            @endforeach
                        <h6 class="mt-4 fw-bold">Done</h6>
                            @foreach ($todolist as $item)
                                @if ($item->is_done == 1)
                                    <li class="list-group-item">
                                        <form action="{{route('destroy', $item->id)}}" method="POST">
                                            {{$item->task}}
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link btn-sm float-end"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <form action="{{route('update', $item->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                                <button type="submit" class="btn btn-link btn-sm float-end mt-n4"><i class="fas fa-circle" title="Click to mark undone"></i></button>
                                        </form>
                                    </li>
                                @endif
                            @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</body>
</html>