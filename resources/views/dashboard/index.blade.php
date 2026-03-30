<x-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>


    <div class="dashboard-header">
        <h1 style="color: black;">Welcome back! </h1>
        <p style="color: black;">Here's what's happening with your website today.</p>
    </div>

{{--<div class="stats-grid">
        <div class="stat-card">
            <h3>Total Users</h3>
            <p class="stat-value">1,234</p>
            <p class="stat-change positive">↑ 12% from last month</p>
        </div>
        <div class="stat-card">
            <h3>Active Sessions</h3>
            <p class="stat-value">567</p>
            <p class="stat-change positive">↑ 8% from last week</p>
        </div>
        <div class="stat-card">
            <h3>Revenue</h3>
            <p class="stat-value">$12.5K</p>
            <p class="stat-change positive">↑ 23% from last month</p>
        </div>
        <div class="stat-card">
            <h3>Bounce Rate</h3>
            <p class="stat-value">34%</p>
            <p class="stat-change negative">↓ -5% improvement</p>
        </div>
    </div> --}}

    

    <div class="content-grid">
        <div class="content-card">
            <h2>Tasks Progress</h2>
            @foreach ($progresses as $progressItem)
            <div class="progress-item">
                <div class="progress-label">                   
                    <span>{{ $progressItem['label'] }}</span>
                    <span>{{ $progressItem['percentage'] }}%</span>
                    </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ $progressItem['percentage'] }}%;"></div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="content-card">
            <h2>Recent Activity</h2>
            <ul class="activity-list">
                <li class="activity-item">
                    <div class="activity-dot"></div>
                    <span class="activity-text">null</span>
                    <span class="activity-time">Test</span>
                </li>
                <li class="activity-item">
                    <div class="activity-dot"></div>
                    <span class="activity-text">null</span>
                    <span class="activity-time">Test</span>
                </li>
                <li class="activity-item">
                    <div class="activity-dot"></div>
                    <span class="activity-text">null</span>
                    <span class="activity-time">test</span>
                </li>
                <li class="activity-item">
                    <div class="activity-dot"></div>
                    <span class="activity-text">null</span>
                    <span class="activity-time">test    </span>
                </li>
            </ul>
        </div>


    </div>

</x-layout>

