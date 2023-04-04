<div class="card">
    <div class="card-header">
        <h3 class="card-title"><a href="{{ route( $route . '.create') }}" style="width: 100px; text-align: center" class="btn btn-success">Create</a></h3>
        @if(method_exists($models,'links'))
            <div class="card-tools">{{ $models->links() }}</div>
        @endif
    </div>
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    @foreach($attributes as $attribute)
                        @php
                            if (mb_substr($attribute, -3) === '_id'){
                                $attribute = mb_substr($attribute, 0, -3);
                            }
                            $attribute = ucwords(implode(' ',preg_split('/(?=[A-Z])/', $attribute)));
                            $attribute = strtolower($attribute);
                            $attribute = ucfirst($attribute);
                        @endphp
                        @if($attribute === 'id')
                            <th style="width: 10px">#</th>
                        @else
                            <th>{{ $attribute }}</th>
                        @endif
                    @endforeach
                    <th style="width: 60px">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
                <tr>
                    @foreach($attributes as $attribute)
                        @if(isset($model->{$attribute}))
                            @php
                                if (mb_substr($attribute, -3) === '_id'){
                                    $attribute = mb_substr($attribute, 0, -3);
                                    $value = $model->{$attribute}->title;
                                }else {
                                    $value = $model->{$attribute};
                                }

                                if (mb_strlen($value) >= 100){
                                    $value = mb_substr($value, 0, 97) . '...';
                                }

                            @endphp
                            @if($attribute === 'preview')
                                <td>
                                    <img height="30" width="30" src="{{ url('storage/' . $value) }}" alt="preview">
                                </td>
                            @else
                                <td>{{ $value }}</td>
                            @endif
                        @endif
                    @endforeach
                    <td class="d-flex">
                        <a href="{{ route($route . '.edit', $model->id) }}" class="btn btn-primary mr-2"><i class="fas fa-external-link-alt"></i></a>
                        <form class="d-inline" action="{{ route($route . '.destroy', $model->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
