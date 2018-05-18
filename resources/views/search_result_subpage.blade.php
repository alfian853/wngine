@foreach ($jobs as $job)
    <h2>{{ $job->name }}</h2>
@endforeach
<br />
{{!! $jobs->links(); !!}}
