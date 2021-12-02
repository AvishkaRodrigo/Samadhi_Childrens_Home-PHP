<!DOCTYPE html>

<head>
    <title>Samadhi Childern Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <script src="script.js"></script>
   <p id="heading">
       SAMADHI CHILDERN HOME
   </p>
<div >
<aside class="sidebar">
    <dl>
        <dt>
            <div class="Overview mainitem">
                <a onclick="setpage('overview.php')"> <button class="btndropdown">OverView</button></a>
                <img src="images/overview.png" alt="overview icon" id="icon">
            </div>
        </dt>
        <dt>
            <div class="Donation mainitem">
                <button class="btndropdown" onclick="displayItems('donation1','donation2','Add Donation','View Donation')">Donation
                    <img src="images/more.png" alt="more icon" id="more">
                    <img src="images/donation.png" alt="overview icon" id="icon">
                </button>
                    <br><a id="donation1" onclick="setpage('donationAdd.php')"></a>
                    <br><a id="donation2" onclick="setpage('donationView.php')"></a>              
            </div>
        </dt>
        <dt>
            <div class="Staff mainitem">
                <button class="btndropdown" onclick="displayItems('staff1','staff2','Add Staff','View Staff')">Staff
                    <img src="images/more.png" alt="more icon" id="more">
                    <img src="images/staff.png" alt="overview icon" id="icon">
                </button>
                    <br><a id="staff1" onclick="setpage('staffAdd.php')"></a>
                    <br><a id="staff2" onclick="setpage('staffView.php')"></a>
            </div>
        </dt>
        <dt>
            <div class="Child mainitem">
                <button class="btndropdown" onclick="displayItems('child1','child2','Add Child','View Child')">Child
                    <img src="images/more.png" alt="more icon" id="more">
                    <img src="images/child.png" alt="overview icon" id="icon">
                </button>                  
                    <br><a id="child1" onclick="setpage('childAdd.php')"></a>
                    <br><a id="child2" onclick="setpage('childView.php')"></a>            
            </div>
        </dt>

        <dt>
            <div class="Labour mainitem">
                <button class="btndropdown" onclick="displayItems2('labour1','labour2','labour3','Add Labour','View Labour','View Labour Salary')">Labour
                    <img src="images/more.png" alt="more icon" id="more">
                    <img src="images/labour.png" alt="overview icon" id="icon">
                </button> 
                <br><a id="labour1" onclick="setpage('labourAdd.php')"></a>
                <br><a id="labour2" onclick="setpage('labourView.php')"></a>    
                <br><a id="labour3" onclick="setpage('labourSalaryView.php')"></a>      
            </div>
        </dt>
        <dt>
            <div class="Logout">
                <button class="btndropdown" id="logout"><a class="btndropdown" href="Logout.php" id="logout">Logout</a></button>
                <img src="images/logout.png" alt="overview icon" id="icon">
            </div>
        </dt>
       
    </dl>
</aside>


<div id="container">

    <object id="innercontainer" type="text/html" data="overview.php"></object>
   
</div>

</body>
</html> 