@extends('layouts.app')

@section('content')
<style>
    .modern-container {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 30px 0;
    }

    .content-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .page-title {
        font-size: 32px;
        font-weight: 700;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 30px;
        text-align: center;
    }

    .btn-add-loan {
        background: linear-gradient(135deg, #10b981, #059669);
        border: none;
        border-radius: 15px;
        padding: 12px 30px;
        font-weight: 600;
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        margin-bottom: 30px;
    }

    .btn-add-loan:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .btn-add-loan::before {
        content: "💰";
        margin-right: 8px;
    }

    .modern-table-container {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border: 1px solid rgba(0,0,0,0.05);
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .modern-table thead {
        background: linear-gradient(135deg, #1f2937, #374151);
    }

    .modern-table thead th {
        padding: 25px 20px;
        text-align: left;
        font-weight: 600;
        color: white;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: none;
        position: relative;
    }

    .modern-table thead th::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 3px;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border-radius: 2px;
    }

    .modern-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #e5e7eb;
    }

    .modern-table tbody tr:hover {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        transform: scale(1.02);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .modern-table tbody tr:last-child {
        border-bottom: none;
    }

    .modern-table tbody td {
        padding: 20px;
        color: #374151;
        font-weight: 500;
        border: none;
        vertical-align: middle;
    }

    .amount-cell {
        font-weight: 700;
        color: #059669;
        font-size: 16px;
    }

    .status-badge {
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .status-diproses {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: white;
    }

    .status-disetujui {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .status-ditolak {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border: none;
        border-radius: 10px;
        padding: 8px 16px;
        color: white;
        font-weight: 600;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        color: white;
    }

    .btn-delete::before {
        content: "🗑️";
        margin-right: 5px;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6b7280;
    }

    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-state-text {
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 10px;
    }

    .empty-state-subtitle {
        font-size: 14px;
        color: #9ca3af;
    }

    .fade-in {
        animation: fadeIn 0.6s ease forwards;
    }

    @keyframes fadeIn {
        from { 
            opacity: 0; 
            transform: translateY(30px); 
        }
        to { 
            opacity: 1; 
            transform: translateY(0); 
        }
    }

    .table-row {
        animation: slideIn 0.5s ease forwards;
    }

    @keyframes slideIn {
        from { 
            opacity: 0; 
            transform: translateX(-30px); 
        }
        to { 
            opacity: 1; 
            transform: translateX(0); 
        }
    }

    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 25px;
        border-radius: 12px;
        color: white;
        font-weight: 600;
        z-index: 1000;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        animation: slideInRight 0.3s ease;
    }

    .notification.success {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .notification.error {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    @keyframes slideInRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @media (max-width: 768px) {
        .content-card {
            padding: 20px;
            margin: 10px;
        }
        
        .modern-table {
            font-size: 14px;
        }
        
        .modern-table thead th,
        .modern-table tbody td {
            padding: 15px 10px;
        }
    }
</style>

<div class="modern-container">
    <div class="container">
        <div class="content-card fade-in">
            <h2 class="page-title">💼 Daftar Pengajuan Pinjaman Modal</h2>
            
            <a href="{{ route('pinjaman.create') }}" class="btn-add-loan">
                + Ajukan Pinjaman Baru
            </a>

            <div class="modern-table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>Usaha</th>
                            <th>Jumlah</th>
                            <th>Alasan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pinjamans as $index => $pinjaman)
                            <tr class="table-row" style="animation-delay: {{ $index * 0.1 }}s">
                                <td>
                                    <strong>{{ $pinjaman->usaha }}</strong>
                                </td>
                                <td class="amount-cell">
                                    Rp {{ number_format($pinjaman->jumlah, 0, ',', '.') }}
                                </td>
                                <td>{{ $pinjaman->alasan }}</td>
                                <td>{{ \Carbon\Carbon::parse($pinjaman->tanggal)->format('d-m-Y') }}</td>
                                <td>
                                    <span class="status-badge 
                                        @if($pinjaman->status == 'Diproses') status-diproses 
                                        @elseif($pinjaman->status == 'Disetujui') status-disetujui 
                                        @else status-ditolak 
                                        @endif">
                                        {{ $pinjaman->status }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('pinjaman.destroy', $pinjaman->id) }}" method="POST" 
                                          style="display: inline-block;" 
                                          onsubmit="return confirmDelete('{{ $pinjaman->usaha }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <div class="empty-state-icon">📋</div>
                                        <div class="empty-state-text">Belum ada pengajuan pinjaman</div>
                                        <div class="empty-state-subtitle">Mulai ajukan pinjaman modal untuk mengembangkan usaha Anda</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(usaha) {
    return confirm(`Apakah Anda yakin ingin menghapus pengajuan pinjaman untuk usaha "${usaha}"?\n\nTindakan ini tidak dapat dibatalkan.`);
}

// Show notification if there's a success message
@if(session('success'))
    showNotification("{{ session('success') }}", 'success');
@endif

@if(session('error'))
    showNotification("{{ session('error') }}", 'error');
@endif

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideInRight 0.3s ease reverse';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 4000);
}

// Add smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>
@endsection