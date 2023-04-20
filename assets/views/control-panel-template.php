<section id="menu">
    <div class="menu">
        <div class="logo">
            <h2>Vadības panelis</h2>
        </div>
    </div>

    <div class="items">
        <li><a href="control-panel">Dashboard</a></li>
        <li class="dropdown">
            <a href="control-panel/products">Products list</a>
            <div class="dropdown-content">
                <a href="/control-panel/products/type-add">Add type</a>
                <a href="/control-panel/products/add">Add product</a>
            </div>
        </li>
        <li><a href="contorl-panel/managers">Managers list</a></li>
    </div>
</section>
<section id="interface">
    <div class="navigation">
        <div class="n1">
            <div class="search">
                <input type="text" placeholder="Search...">
            </div>
        </div>

        <div class="profile">
            <p><?php echo $_SESSION['user']['username']?></p>
        </div>


    </div>
    
    <h3 class="i-name">
            Dashboard
    </h3>

    <div class="values">
        <div class="val-box">
            <i></i>
            <div>
                <h3><?php echo 8282 ?></h3>
                <span>New Users</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div class="val-center">
                <h3>83,267</h3>
                <span>Total orders</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div>
                <h3>822,267</h3>
                <span>Products sell</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div>
                <h3>$8.26</h3>
                <span>This month</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div>
                <h3>$8.26</h3>
                <span>This month</span>
            </div>
        </div>
    </div>

    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Title</td>
                    <td>Status</td>
                    <td>Role</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="people">
                        <div class="people-de">
                            <h5>JohnDoe</h5>
                            <p>email</p>
                        </div>
                    </td>

                    <td class="people-des">
                        <h5>Software Engineer</h5>
                        <p>Web dev</p>
                    </td>

                    <td class="activee"><p>Active</p></td>
                    <td class="role">
                        <p>Owner</p>
                    </td>

                    <td class="edit"><a href="#">Edit</a></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td class="people">
                        <div class="people-de">
                            <h5>JohnDoe</h5>
                            <p>email</p>
                        </div>
                    </td>

                    <td class="people-des">
                        <h5>Software Engineer</h5>
                        <p>Web dev</p>
                    </td>

                    <td class="activee"><p>Active</p></td>
                    <td class="role">
                        <p>Owner</p>
                    </td>

                    <td class="edit"><a href="#">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>