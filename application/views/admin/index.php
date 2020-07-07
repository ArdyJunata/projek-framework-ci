<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-user"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span id="user">0</span></div>
                                    <div class="stat-heading">User</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-shield"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span id="admin">0</span></div>
                                    <div class="stat-heading">Admin</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    const getCount = async (id) => {
        let res = await fetch(`http://localhost:3000/user/count/${id}`)
        return await res.json()
    }

    const changeCount = (users, admins) => {
        let data = users;
        let data2 = admins;
        const user = document.getElementById('user')
        const admin = document.getElementById('admin')
        user.innerHTML = data.data[0].count
        admin.innerHTML = data2.data[0].count
    }

    setInterval(async () => {
        let user = await getCount(1)
        let admin = await getCount(2)
        changeCount(user, admin)
    }, 1000)
</script>