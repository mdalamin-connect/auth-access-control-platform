@extends('layout.erp.app')
@section('title', 'Leave Balance')
@section('style')
<style>
    .mirsaige-leave-balance-container {
        padding: var(--mirsaige-space-md);
        max-width: 1000px;
        margin: 0 auto;
    }

    .mirsaige-balance-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-md);
        border: 1px solid rgba(255, 178, 62, 0.2);
        box-shadow: var(--mirsaige-shadow-sm);
    }

    .mirsaige-balance-title {
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-md);
        font-size: 1.25rem;
        border-bottom: 1px solid rgba(255, 178, 62, 0.2);
        padding-bottom: var(--mirsaige-space-xs);
    }

    .mirsaige-balance-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: var(--mirsaige-space-md);
    }

    .mirsaige-balance-item {
        background: var(--mirsaige-darker-blue);
        padding: var(--mirsaige-space-sm);
        border-radius: 6px;
        border-left: 4px solid var(--mirsaige-accent);
    }

    .mirsaige-balance-item-title {
        font-weight: 600;
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-xs);
    }

    .mirsaige-balance-progress {
        height: 8px;
        background: rgba(255, 178, 62, 0.1);
        border-radius: 4px;
        margin: var(--mirsaige-space-xs) 0;
        overflow: hidden;
    }

    .mirsaige-balance-progress-bar {
        height: 100%;
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-balance-stats {
        display: flex;
        justify-content: space-between;
        font-size: 0.85rem;
    }

    .mirsaige-balance-stat {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .mirsaige-balance-stat-value {
        font-weight: 700;
        color: var(--mirsaige-white);
    }

    .mirsaige-balance-stat-label {
        font-size: 0.75rem;
        color: var(--mirsaige-text);
        opacity: 0.8;
    }

    /* Responsive Styles */
    @media (max-width: 767px) {
        .mirsaige-leave-balance-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-balance-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 575px) {
        .mirsaige-balance-stats {
            flex-direction: column;
            gap: var(--mirsaige-space-xs);
        }
        
        .mirsaige-balance-stat {
            flex-direction: row;
            justify-content: space-between;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-leave-balance-container">
    <div class="mirsaige-balance-card">
        <h2 class="mirsaige-balance-title">My Leave Balance</h2>
        
        <div class="mirsaige-balance-grid">
            @foreach($balances as $balance)
            <div class="mirsaige-balance-item">
                <h3 class="mirsaige-balance-item-title">{{ $balance['name'] }}</h3>
                
                <div class="mirsaige-balance-progress">
                    <div class="mirsaige-balance-progress-bar" 
                         style="width: {{ ($balance['used'] / $balance['allocated']) * 100 }}%"></div>
                </div>
                
                <div class="mirsaige-balance-stats">
                    <div class="mirsaige-balance-stat">
                        <span class="mirsaige-balance-stat-value">{{ $balance['allocated'] }}</span>
                        <span class="mirsaige-balance-stat-label">Allocated</span>
                    </div>
                    <div class="mirsaige-balance-stat">
                        <span class="mirsaige-balance-stat-value">{{ $balance['used'] }}</span>
                        <span class="mirsaige-balance-stat-label">Used</span>
                    </div>
                    <div class="mirsaige-balance-stat">
                        <span class="mirsaige-balance-stat-value">{{ $balance['remaining'] }}</span>
                        <span class="mirsaige-balance-stat-label">Remaining</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection