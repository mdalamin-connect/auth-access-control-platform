


@extends('layout.erp.app')
@section('title', 'Mirsaige Construction Management System - Dashboard')
@section('style')
    <style>
        /* Dashboard Specific Styles */
        :root {
            --mirsaige-primary: #1a237e;
            --mirsaige-primary-light: #534bae;
            --mirsaige-primary-dark: #000051;
            --mirsaige-accent: #ffb23e;
            --mirsaige-accent-light: #ffe97d;
            --mirsaige-accent-dark: #c78400;
            --mirsaige-white: #ffffff;
            --mirsaige-light: #f5f5f5;
            --mirsaige-text: #e0e0e0;
            --mirsaige-text-dark: #9e9e9e;
            --mirsaige-dark-blue: #0f172a;
            --mirsaige-darker-blue: #020617;
            --mirsaige-success: #4caf50;
            --mirsaige-warning: #ff9800;
            --mirsaige-danger: #f44336;
            --mirsaige-info: #2196f3;
            
            --mirsaige-space-xs: 0.5rem;
            --mirsaige-space-sm: 0.75rem;
            --mirsaige-space-md: 1rem;
            --mirsaige-space-lg: 1.5rem;
            --mirsaige-space-xl: 2rem;
            --mirsaige-space-2xl: 3rem;
            --mirsaige-space-3xl: 4rem;
            
            --mirsaige-radius-sm: 4px;
            --mirsaige-radius-md: 8px;
            --mirsaige-radius-lg: 12px;
            --mirsaige-radius-xl: 16px;
            
            --mirsaige-shadow-sm: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            --mirsaige-shadow-md: 0 4px 6px rgba(0,0,0,0.1), 0 1px 3px rgba(0,0,0,0.08);
            --mirsaige-shadow-lg: 0 10px 20px rgba(0,0,0,0.1), 0 6px 6px rgba(0,0,0,0.1);
            --mirsaige-shadow-xl: 0 15px 25px rgba(0,0,0,0.1), 0 10px 10px rgba(0,0,0,0.08);
        }

        .mirsaige-dashboard {
            padding: var(--mirsaige-space-md);
            background: var(--mirsaige-darker-blue);
            min-height: 100vh;
        }

        .mirsaige-dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--mirsaige-space-lg);
            flex-wrap: wrap;
            gap: var(--mirsaige-space-sm);
        }

        .mirsaige-dashboard-title {
            color: var(--mirsaige-white);
            font-size: 1.75rem;
            font-weight: 600;
            margin: 0;
            background: linear-gradient(90deg, var(--mirsaige-accent), var(--mirsaige-accent-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .mirsaige-breadcrumbs {
            display: flex;
            gap: var(--mirsaige-space-xs);
            align-items: center;
            font-size: 0.85rem;
            color: var(--mirsaige-text);
        }

        .mirsaige-breadcrumbs a {
            color: var(--mirsaige-accent);
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .mirsaige-breadcrumbs a:hover {
            text-decoration: underline;
            color: var(--mirsaige-accent-light);
        }

        .mirsaige-breadcrumbs .divider {
            color: var(--mirsaige-text);
            opacity: 0.6;
        }

        .mirsaige-report-dropdown {
            position: relative;
        }

        .mirsaige-report-btn {
            background: var(--mirsaige-dark-blue);
            color: var(--mirsaige-accent);
            border: 1px solid var(--mirsaige-accent);
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            border-radius: var(--mirsaige-radius-sm);
            display: flex;
            align-items: center;
            gap: var(--mirsaige-space-xs);
            transition: all 0.3s ease;
            cursor: pointer;
            font-weight: 500;
            box-shadow: var(--mirsaige-shadow-sm);
        }

        .mirsaige-report-btn:hover {
            background: rgba(255, 178, 62, 0.1);
            transform: translateY(-1px);
            box-shadow: var(--mirsaige-shadow-md);
        }

        .mirsaige-report-dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            background: var(--mirsaige-dark-blue);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: var(--mirsaige-radius-sm);
            padding: var(--mirsaige-space-xs) 0;
            min-width: 200px;
            box-shadow: var(--mirsaige-shadow-lg);
            opacity: 0;
            pointer-events: none;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .mirsaige-report-dropdown-menu.show {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        .mirsaige-report-dropdown-menu a {
            display: block;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
            color: var(--mirsaige-text);
            transition: all 0.2s ease;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .mirsaige-report-dropdown-menu a:hover {
            background: rgba(255, 178, 62, 0.1);
            color: var(--mirsaige-accent);
            padding-left: var(--mirsaige-space-lg);
        }

        /* Project Cards Grid */
        .mirsaige-projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: var(--mirsaige-space-md);
            margin-bottom: var(--mirsaige-space-xl);
        }

        .mirsaige-project-card {
            background: var(--mirsaige-dark-blue);
            border-radius: var(--mirsaige-radius-md);
            padding: var(--mirsaige-space-md);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 178, 62, 0.1);
            position: relative;
            overflow: hidden;
            box-shadow: var(--mirsaige-shadow-sm);
            display: flex;
            flex-direction: column;
        }

        .mirsaige-project-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--mirsaige-shadow-lg);
            border-color: var(--mirsaige-accent);
        }

        .mirsaige-project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--mirsaige-accent);
        }

        .mirsaige-project-name {
            color: var(--mirsaige-white);
            font-size: 1.2rem;
            margin-bottom: var(--mirsaige-space-sm);
            font-weight: 600;
            line-height: 1.3;
        }

        .mirsaige-project-link {
            display: inline-flex;
            align-items: center;
            color: var(--mirsaige-accent);
            font-size: 0.9rem;
            transition: all 0.2s ease;
            margin-top: auto;
            align-self: flex-end;
            padding: var(--mirsaige-space-2xs) var(--mirsaige-space-xs);
            border-radius: var(--mirsaige-radius-sm);
            text-decoration: none;
        }

        .mirsaige-project-link:hover {
            color: var(--mirsaige-accent-light);
            background: rgba(255, 178, 62, 0.1);
        }

        .mirsaige-project-link i {
            margin-left: var(--mirsaige-space-2xs);
            transition: transform 0.2s ease;
        }

        .mirsaige-project-link:hover i {
            transform: translateX(3px);
        }


        /* Stats Cards */

        .mirsaige-stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: var(--mirsaige-space-md);
            margin-bottom: var(--mirsaige-space-xl);
        }


        .mirsaige-stat-card {
            background: var(--mirsaige-dark-blue);
            border-radius: var(--mirsaige-radius-md);
            padding: var(--mirsaige-space-md);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 178, 62, 0.1);
            box-shadow: var(--mirsaige-shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .mirsaige-stat-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--mirsaige-shadow-md);
            border-color: var(--mirsaige-accent);
        }

        .mirsaige-stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--mirsaige-accent);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .mirsaige-stat-card:hover::after {
            transform: scaleX(1);
        }

        .mirsaige-stat-icon {
            font-size: 2.5rem;
            color: var(--mirsaige-accent);
            margin-bottom: var(--mirsaige-space-sm);
            transition: all 0.3s ease;
        }

        .mirsaige-stat-card:hover .mirsaige-stat-icon {
            transform: scale(1.1);
        }

        .mirsaige-stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--mirsaige-white);
            margin-bottom: var(--mirsaige-space-xs);
            line-height: 1;
        }

        .mirsaige-stat-label {
            font-size: 0.9rem;
            color: var(--mirsaige-text);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        /* Enhanced Stock Reports Section */
        .mirsaige-stock-section {
            margin-bottom: var(--mirsaige-space-xl);
        }

        .mirsaige-section-title {
            color: var(--mirsaige-white);
            font-size: 1.5rem;
            margin-bottom: var(--mirsaige-space-md);
            padding-bottom: var(--mirsaige-space-sm);
            border-bottom: 1px solid rgba(255, 178, 62, 0.2);
            position: relative;
            display: flex;
            align-items: center;
            gap: var(--mirsaige-space-sm);
        }

        .mirsaige-section-title i {
            color: var(--mirsaige-accent);
            font-size: 1.8rem;
        }

        .mirsaige-section-title::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 120px;
            height: 3px;
            background: linear-gradient(90deg, var(--mirsaige-accent), transparent);
            border-radius: 3px;
        }

        .mirsaige-stock-container {
            display: flex;
            flex-direction: column;
            gap: var(--mirsaige-space-md);
        }

        .mirsaige-stock-project-card {
            background: var(--mirsaige-dark-blue);
            border-radius: var(--mirsaige-radius-md);
            overflow: hidden;
            box-shadow: var(--mirsaige-shadow-sm);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 178, 62, 0.1);
        }

        .mirsaige-stock-project-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--mirsaige-shadow-md);
            border-color: var(--mirsaige-accent);
        }

        .mirsaige-stock-project-header {
            background: linear-gradient(90deg, var(--mirsaige-primary), var(--mirsaige-primary-light));
            padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
            color: var(--mirsaige-white);
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mirsaige-stock-project-header:hover {
            background: linear-gradient(90deg, var(--mirsaige-primary-light), var(--mirsaige-primary));
        }

        .mirsaige-stock-project-title {
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: var(--mirsaige-space-sm);
        }

        .mirsaige-stock-project-title i {
            font-size: 1.2rem;
            color: var(--mirsaige-accent);
        }

        .mirsaige-stock-project-toggle {
            transition: transform 0.3s ease;
        }

        .mirsaige-stock-project-card.active .mirsaige-stock-project-toggle {
            transform: rotate(180deg);
        }

        .mirsaige-stock-project-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }

        .mirsaige-stock-project-card.active .mirsaige-stock-project-content {
            max-height: 1000px;
        }

        .mirsaige-stock-table-container {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .mirsaige-stock-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        .mirsaige-stock-table th {
            background: var(--mirsaige-darker-blue);
            color: var(--mirsaige-accent);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
            text-align: left;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .mirsaige-stock-table td {
            padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
            color: var(--mirsaige-text);
            font-size: 0.9rem;
            border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        }

        .mirsaige-stock-table tr:last-child td {
            border-bottom: none;
        }

        .mirsaige-stock-table tr:hover td {
            background: rgba(255, 178, 62, 0.05);
            color: var(--mirsaige-white);
        }

        .mirsaige-stock-table .stock-in {
            color: var(--mirsaige-success);
            font-weight: 500;
        }

        .mirsaige-stock-table .stock-out {
            color: var(--mirsaige-warning);
            font-weight: 500;
        }

        .mirsaige-stock-table .stock-damage {
            color: var(--mirsaige-danger);
            font-weight: 500;
        }

        .mirsaige-stock-table .stock-current {
            color: var(--mirsaige-info);
            font-weight: 500;
        }

        .mirsaige-stock-no-data {
            padding: var(--mirsaige-space-xl);
            text-align: center;
            color: var(--mirsaige-text-dark);
            font-size: 0.9rem;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .mirsaige-animate {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }

        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .mirsaige-projects-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }
            
            .mirsaige-stats-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }

        @media (max-width: 992px) {
            .mirsaige-dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--mirsaige-space-md);
            }
            
            .mirsaige-report-dropdown {
                width: 100%;
            }
            
            .mirsaige-report-dropdown-menu {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .mirsaige-projects-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
            
            .mirsaige-stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .mirsaige-section-title {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 576px) {
            .mirsaige-projects-grid {
                grid-template-columns: 1fr;
            }
            
            .mirsaige-stats-grid {
                grid-template-columns: 1fr;
            }
            
            .mirsaige-section-title {
                font-size: 1.2rem;
            }
            
            .mirsaige-stat-icon {
                font-size: 2rem;
            }
            
            .mirsaige-stat-value {
                font-size: 1.5rem;
            }
        }
    </style>
@endsection

@section('page')
    <div class="mirsaige-dashboard">
        <!-- Dashboard Header -->
        <div class="mirsaige-dashboard-header">
            <div>
                <h1 class="mirsaige-dashboard-title">Dashboard</h1>
                <div class="mirsaige-breadcrumbs">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                    <span class="divider">/</span>
                    <span>Dashboard</span>
                </div>
            </div>
            
            <div class="mirsaige-report-dropdown">
                <button class="mirsaige-report-btn" id="reportDropdownBtn">
                    <i class='bx bx-file'></i>
                    <span>Reports</span>
                    <i class='bx bx-chevron-down'></i>
                </button>
                <div class="mirsaige-report-dropdown-menu" id="reportDropdown">
                    <a href="{{ url('/report/requisition') }}"><i class='bx bx-task'></i> Requisition</a>
                    <a href="{{ url('/report/purchase') }}"><i class='bx bx-cart'></i> Purchase</a>
                    <a href="{{ url('/report/stock') }}"><i class='bx bx-package'></i> Stock</a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="mirsaige-stats-grid">
            <div class="mirsaige-stat-card mirsaige-animate">
                <div class="mirsaige-stat-icon">
                    <i class='bx bx-building-house'></i>
                </div>
                <div class="mirsaige-stat-value">{{ $projects->count() }}</div>
                <div class="mirsaige-stat-label">Active Projects</div>
            </div>
            
            <div class="mirsaige-stat-card mirsaige-animate delay-1">
                <div class="mirsaige-stat-icon">
                    <i class='bx bx-package'></i>
                </div>
                <div class="mirsaige-stat-value">{{ $totalProducts }}</div>
                <div class="mirsaige-stat-label">Total Products</div>
            </div>
            
            <div class="mirsaige-stat-card mirsaige-animate delay-2">
                <div class="mirsaige-stat-icon">
                    <i class='bx bx-cart'></i>
                </div>
                <div class="mirsaige-stat-value">{{ $totalPurchases }}</div>
                <div class="mirsaige-stat-label">Total Purchases</div>
            </div>
            
            <div class="mirsaige-stat-card mirsaige-animate delay-3">
                <div class="mirsaige-stat-icon">
                    <i class='bx bx-task'></i>
                </div>
                <div class="mirsaige-stat-value">{{ $totalRequisitions }}</div>
                <div class="mirsaige-stat-label">Total Requisitions</div>
            </div>
            
            @isset($stockSummary)
            <div class="mirsaige-stat-card mirsaige-animate delay-1">
                <div class="mirsaige-stat-icon">
                    <i class='bx bx-arrow-to-bottom'></i>
                </div>
                <div class="mirsaige-stat-value">{{ $stockSummary->total_purchased ?? 0 }}</div>
                <div class="mirsaige-stat-label">Items Purchased</div>
            </div>
            
            <div class="mirsaige-stat-card mirsaige-animate delay-2">
                <div class="mirsaige-stat-icon">
                    <i class='bx bx-arrow-from-bottom'></i>
                </div>
                <div class="mirsaige-stat-value">{{ $stockSummary->total_used ?? 0 }}</div>
                <div class="mirsaige-stat-label">Items Used</div>
            </div>
            
            <div class="mirsaige-stat-card mirsaige-animate delay-3">
                <div class="mirsaige-stat-icon">
                    <i class='bx bx-error-circle'></i>
                </div>
                <div class="mirsaige-stat-value">{{ $stockSummary->total_damaged ?? 0 }}</div>
                <div class="mirsaige-stat-label">Items Damaged</div>
            </div>
            @endisset
        </div>

        <!-- Projects Grid -->
        <div class="mirsaige-section-title">
            <i class='bx bx-folder-open'></i>
            <span>Active Projects</span>
        </div>
        <div class="mirsaige-projects-grid">
            @foreach($projects as $project)
            <div class="mirsaige-project-card mirsaige-animate delay-{{ $loop->index % 4 }}">
                <h3 class="mirsaige-project-name">{{ $project->name }}</h3>
                <a href="{{ url('/project-report', $project->id) }}" class="mirsaige-project-link">
                    View Report
                    <i class='bx bx-chevron-right'></i>
                </a>
            </div>
            @endforeach
        </div>

        <!-- Enhanced Stock Reports Section -->
        <div class="mirsaige-stock-section">
            <div class="mirsaige-section-title">
                <i class='bx bx-stats'></i>
                <span>Monthly Stock Reports</span>
            </div>
            
            <div class="mirsaige-stock-container">
                @foreach($projects as $project)
                    @php
                        $startOfMonth = \Illuminate\Support\Carbon::now()->startOfMonth()->toDateTimeString();
                        $endOfMonth = \Illuminate\Support\Carbon::now()->endOfMonth()->toDateTimeString();
                        $stockDetails = \App\Models\Stock::select(
                            'product_id',
                            'project_id',
                            'uom_id',
                            DB::raw('SUM(CASE WHEN transaction_type = "Purchase" THEN qty ELSE 0 END) as in_stock'),
                            DB::raw('SUM(CASE WHEN transaction_type = "Used" THEN qty ELSE 0 END) as stock_out'),
                            DB::raw('SUM(CASE WHEN transaction_type = "Damage" THEN qty ELSE 0 END) as damage'),
                            DB::raw('(SUM(CASE WHEN transaction_type = "Purchase" THEN qty ELSE 0 END) - SUM(CASE WHEN transaction_type = "Used" THEN qty ELSE 0 END) - SUM(CASE WHEN transaction_type = "Damage" THEN qty ELSE 0 END)) as current_stock')
                        )
                        ->where('project_id', $project->id)
                        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                        ->groupBy('product_id', 'uom_id', 'project_id')
                        ->get();
                    @endphp
                    
                    <div class="mirsaige-stock-project-card mirsaige-animate delay-{{ $loop->index % 3 }} {{ $loop->first ? 'active' : '' }}">
                        <div class="mirsaige-stock-project-header">
                            <div class="mirsaige-stock-project-title">
                                <i class='bx bx-building'></i>
                                <span>{{ $project->name }}</span>
                            </div>
                            <i class='bx bx-chevron-down mirsaige-stock-project-toggle'></i>
                        </div>
                        
                        <div class="mirsaige-stock-project-content">
                            <div class="mirsaige-stock-table-container">
                                <table class="mirsaige-stock-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>In Stock</th>
                                            <th>Used</th>
                                            <th>Damage</th>
                                            <th>Current</th>
                                            <th>UOM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stockDetails as $stockDetail)
                                            <tr>
                                                <td>{{ $stockDetail->product->name ?? 'N/A' }}</td>
                                                <td class="stock-in">{{ $stockDetail->in_stock }}</td>
                                                <td class="stock-out">{{ $stockDetail->stock_out }}</td>
                                                <td class="stock-damage">{{ $stockDetail->damage }}</td>
                                                <td class="stock-current">{{ $stockDetail->current_stock }}</td>
                                                <td>{{ $stockDetail->uom->name ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                        @if($stockDetails->isEmpty())
                                            <tr>
                                                <td colspan="6" class="mirsaige-stock-no-data">
                                                    <i class='bx bx-package' style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                                                    <div>No stock data available for this project</div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Toggle report dropdown
        document.getElementById('reportDropdownBtn').addEventListener('click', function() {
            document.getElementById('reportDropdown').classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.mirsaige-report-dropdown')) {
                document.getElementById('reportDropdown').classList.remove('show');
            }
        });

        // Toggle stock project cards
        document.querySelectorAll('.mirsaige-stock-project-header').forEach(header => {
            header.addEventListener('click', () => {
                const card = header.closest('.mirsaige-stock-project-card');
                card.classList.toggle('active');
            });
        });

        // Add animation classes as elements come into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('mirsaige-animate');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.mirsaige-project-card, .mirsaige-stat-card, .mirsaige-stock-project-card').forEach((card, index) => {
            // Add delay classes based on index
            const delayClass = `delay-${index % 4}`;
            card.classList.add(delayClass);
            
            // Observe for animations
            observer.observe(card);
        });

        // Initialize first stock card as open by default
        document.querySelector('.mirsaige-stock-project-card')?.classList.add('active');
    </script>
@endsection