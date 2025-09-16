<template lang="">
    <div>
        <div style="font-family: Arial, sans-serif; max-width:1100px; margin:24px auto;">
            <header style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <h1 style="margin:0; font-size:20px;">Admin Dashboard</h1>
                <div>
                    <button style="padding:6px 12px; border:1px solid #ccc; border-radius:4px; background:#fff; margin-right:8px;">Settings</button>
                    <button style="padding:6px 12px; border:none; border-radius:4px; background:#2d8cf0; color:#fff;">Sign out</button>
                </div>
            </header>

            <div style="display:flex; gap:16px;">
                <aside style="width:220px; background:#f7f7f7; padding:12px; border-radius:8px;">
                    <nav>
                        <ul style="list-style:none; padding:0; margin:0;">
                            <li style="margin-bottom:8px;"><a href="#" style="text-decoration:none; color:#333;">Overview</a></li>
                            <li style="margin-bottom:8px;"><a href="#" style="text-decoration:none; color:#333;">Users</a></li>
                            <li style="margin-bottom:8px;"><a href="#" style="text-decoration:none; color:#333;">Posts</a></li>
                            <li style="margin-bottom:8px;"><a href="#" style="text-decoration:none; color:#333;">Comments</a></li>
                            <li style="margin-bottom:8px;"><a href="#" style="text-decoration:none; color:#333;">Settings</a></li>
                        </ul>
                    </nav>
                </aside>

                <main style="flex:1;">
                    <section style="display:flex; gap:12px; margin-bottom:16px;">
                        <div style="flex:1; padding:12px; background:#fff; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                            <div style="font-size:12px; color:#666;">Total Users</div>
                            <div style="font-size:20px; font-weight:600;">1,234</div>
                            <div style="font-size:12px; color:#2d8cf0; margin-top:6px;">+5% since last week</div>
                        </div>
                        <div style="flex:1; padding:12px; background:#fff; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                            <div style="font-size:12px; color:#666;">Total Posts</div>
                            <div style="font-size:20px; font-weight:600;">567</div>
                            <div style="font-size:12px; color:#2d8cf0; margin-top:6px;">+2% since last week</div>
                        </div>
                        <div style="flex:1; padding:12px; background:#fff; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                            <div style="font-size:12px; color:#666;">Pending Comments</div>
                            <div style="font-size:20px; font-weight:600;">12</div>
                            <div style="font-size:12px; color:#ff6600; margin-top:6px;">3 awaiting review</div>
                        </div>
                    </section>

                    <section style="background:#fff; padding:12px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                            <h2 style="margin:0; font-size:16px;">Recent Activity</h2>
                            <div>
                                <input placeholder="Search..." style="padding:6px 8px; border:1px solid #ddd; border-radius:4px;" />
                                <button style="padding:6px 10px; margin-left:8px; border:none; background:#2d8cf0; color:#fff; border-radius:4px;">Filter</button>
                            </div>
                        </div>

                        <table style="width:100%; border-collapse:collapse; font-size:14px;">
                            <thead>
                                <tr style="text-align:left; border-bottom:1px solid #eee;">
                                    <th style="padding:8px 6px;">User</th>
                                    <th style="padding:8px 6px;">Action</th>
                                    <th style="padding:8px 6px;">Target</th>
                                    <th style="padding:8px 6px;">When</th>
                                    <th style="padding:8px 6px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom:1px solid #fafafa;">
                                    <td style="padding:10px 6px;">Jane Doe</td>
                                    <td style="padding:10px 6px;">Created post</td>
                                    <td style="padding:10px 6px;">"Welcome to the blog"</td>
                                    <td style="padding:10px 6px; color:#888;">2 hours ago</td>
                                    <td style="padding:10px 6px;"><button style="padding:6px 8px; border:none; background:#28a745; color:#fff; border-radius:4px;">View</button></td>
                                </tr>
                                <tr style="border-bottom:1px solid #fafafa;">
                                    <td style="padding:10px 6px;">Mike Lee</td>
                                    <td style="padding:10px 6px;">Commented</td>
                                    <td style="padding:10px 6px;">"Nice article"</td>
                                    <td style="padding:10px 6px; color:#888;">6 hours ago</td>
                                    <td style="padding:10px 6px;"><button style="padding:6px 8px; border:none; background:#ffc107; color:#222; border-radius:4px;">Review</button></td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 6px;">System</td>
                                    <td style="padding:10px 6px;">Scheduled backup</td>
                                    <td style="padding:10px 6px;">Database</td>
                                    <td style="padding:10px 6px; color:#888;">1 day ago</td>
                                    <td style="padding:10px 6px;"><button style="padding:6px 8px; border:none; background:#6c757d; color:#fff; border-radius:4px;">Details</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </main>
            </div>
        </div>
    </div>
</template>
<script>

</script>
