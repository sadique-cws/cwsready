.menu-toggle {
    position: fixed;
    right: 15px;
    top:6px;
    padding-top: 5px;
    width: 50px;
    height: 50px;
    text-align: center;
    color: rgb(70, 69, 69);
    
    line-height: 50px;
    z-index: 9999;
  }
  
  .menu-toggle:focus,
  .menu-toggle:hover {
    color: rgb(70, 69, 69);
  }
  
  .menu-toggle:hover {
    background: #8f8f8f96;
  }
  
  /* ************************ */
  #sidebar-wrapper {
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 250px;
    height: 100%;
    transition: all 0.4s ease 0s;
    transform: translateX(-250px);
    background: #1a1a2e;
    background-image: url('images/5.svg'); 
    background-size:cover; 
    background-position:bottom;
    border-left: 1px solid rgba(255, 255, 255, 0.1);
  }
  
  .sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
  }
  
  .sidebar-nav li.sidebar-nav-item a {
    display: block;
    text-decoration: none;
    color: #fff;
    padding: 15px;
  }
  .sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255, 255, 255, 0.2);
  }
  
  .sidebar-nav li a:active,
  .sidebar-nav li a:focus {
    text-decoration: none;
  }
  
  .sidebar-nav > .sidebar-brand {
    font-size: 1.2rem;
    background: rgba(52, 58, 64, 0.1);
    height: 80px;
    text-decoration: none;
    line-height: 50px;
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 15px;
  }
  .sidebar-nav > .sidebar-brand a {
    color: #fff;
  }
  
  .sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
  }
  
  #sidebar-wrapper.active {
    left: 250px;
    width: 250px;
    transition: all 0.4s ease 0s;
  }
  .menu-toggle{
      display:none;
  }

  .nav-item{
      transition-delay: .3s;
      transition: linear;
      height: 45px;
  }
  .nav-item:hover, .nav-item:active, .nav-item:focus{
      border-bottom: 2px solid black;
  }
  .content{
    margin-top: 170px;
  }
  @media (max-width: 992px) {
        .navbar-nav, .hero{
            display: none;
        }
        
        .content{
            margin-top: 120px;
        }
        .menu-toggle{
            display: block;
        }
        .navbar-brand{
            margin-left: auto;
            margin-right: auto;
        }
        .navbar-mobile{
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        }
  }
  @media (max-width:1300){
      .sidebar-wrapper{
          display: none;
          background-color: rgba(0, 0, 0, 0.555);
      }
      
      
  }

 
  .post-item{
    transition: .5s all linear;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.25)!important;
  }
  .post-item:hover{
    transition: .5s all linear;
    top:-5px;
    border-radius:10px;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.85)!important;
  }
  .list:hover{
    background: #0009;
  }