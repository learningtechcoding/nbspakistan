@extends('admin.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>NBS</strong> Dashboard</h3>
                </div>

                <div class="col-auto ms-auto text-end mt-n1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                            <li class="breadcrumb-item"><a>Admin Panel</a></li>
                            <li class="breadcrumb-item"><a>Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Analytics
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Registrations</h5>
                                        <h1 class="mt-1 mb-3">{{ $registrations }}</h1>
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-lg btn-primary" href="/admin/registrations">Manage</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Videos</h5>
                                        <h1 class="mt-1 mb-3">{{ $videos }}</h1>
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-lg btn-info" href="/admin/videos">More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Team Members</h5>
                                        <h1 class="mt-1 mb-3">{{ $members }}</h1>
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-lg btn-secondary" href="/admin/team">Manage</a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Blogs</h5>
                                        <h1 class="mt-1 mb-3">{{ $blogs }}</h1>
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-lg btn-success" href="/admin/blogs">Manage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-0 mt-4">
            <div class="row">
                <div class="col-auto d-none d-sm-block">
                    <h3>General</h3>
                </div>
            </div>

            <form method="POST" action="/admin/general-info/update" class="d-flex flex-column">
                @csrf
                @method('PUT')
                <label for="announcement-string">Announcement</label>
                <textarea name="announcement-string" id="announcement-string" style="width: 100%" rows="2">
                                        {{ $announcementString }}
                    </textarea>

                <div class="mt-4"></div>
                <label for="latest-news">Latest News</label>
                <textarea name="latest-news" id="latest-news" style="width: 100%" rows="2">
                                        {{ $latestNews }}
                                    </textarea>

                <div class="mt-4"></div>
                <div class="d-flex w-100 justify-content-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </main>
@endsection
