<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bootstrap 5</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: .875rem;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }
        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <i class="bi bi-house-door"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-file-earmark"></i> Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-cart"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people"></i> Customers
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                    </div>
                </div>

                <!-- Cards Section -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Eksekutif Dewasa : <span id="eksekutif_dewasa">{{ $avRanap->eksekutif_dewasa }}</span></h5>
                                <h5 class="card-title">VIP Dewasa : <span id="vip_dewasa">{{ $avRanap->vip_dewasa }}</span></h5>
                                <h5 class="card-title">Kelas 1 Dewasa : <sapn id="kelas_1_dewasa">{{ $avRanap->kelas_1_dewasa }}</sapn></h5>
                                <h5 class="card-title">Kelas 2 Dewasa : <sapn id="kelas_2_dewasa">{{ $avRanap->kelas_2_dewasa }}</sapn></h5>
                                <h5 class="card-title">Kelas 3 Dewasa : <span id="kelas_3_dewasa">{{ $avRanap->kelas_3_dewasa }}</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Customers</h5>
                                <p class="card-text">You gained 10 new customers this week.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Revenue</h5>
                                <p class="card-text">$2,500 in revenue generated this month.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <h2>Recent Orders</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2024-10-01</td>
                                <td>John Doe</td>
                                <td>Shipped</td>
                                <td>$100.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2024-10-02</td>
                                <td>Jane Smith</td>
                                <td>Processing</td>
                                <td>$150.00</td>
                            </tr>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/plugins/pusher/pusher.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            Pusher.logToConsole = false;

            var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
                cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
                encrypted: true
            });

            var channel = pusher.subscribe('monitoring_bed');
            channel.bind('App\\Events\\WebHookJakConnected', function(data) {
                var parseData = JSON.parse(data.data)
                console.log(parseData)
                $('#eksekutif_dewasa').text(parseData.ranap_dewasa.kapasitas.eksekutif_dewasa);
                $('#vip_dewasa').text(parseData.ranap_dewasa.kapasitas.vip_dewasa);
            });
        })
    </script>
</body>
</html>
