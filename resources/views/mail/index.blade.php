@extends('layouts.app')

@section('title') Email @endsection

@section('content')
  <div class="container app">
  <aside class="sidebar">
    <h1 class="logo">
      <a href="#">Simpl<strong>est</strong></a>
    </h1>
    <nav class="main-nav">
      <ul>
        <li><a href="#">Profile</a></li>
        <li class="active">
          <a href="#">Email</a><br />
          <a href="#" class="btn btn-primary">Compose new</a>
          <ul>
            <li class="active"><a href="#">Inbox <span class="btn btn-primary">25</span></a></li>
            <li><a href="#">Drafts</a></li>
            <li><a href="#">Sent</a></li>
            <li><a href="#">Trash</a></li>
            <li><a href="#">Junk Mail</a></li>
          </ul>
          <ul class="labels">
            <li><a href="#">Clients <span class="btn btn-primary label"></span></a></li>
            <li><a href="#">Friends <span class="btn btn-primary label"></span></a></li>
            <li><a href="#">Family <span class="btn btn-primary label"></span></a></li>
            <li><a href="#">Dribbble <span class="btn btn-primary label"></span></a></li>
          </ul>
        </li>
        <li><a href="#">Docs</a></li>
        <li><a href="#">Stats</a></li>
      </ul>
    </nav>
  </aside>
  <div class="main">
    <header class="header">
      <form action="">
        <input type="search" name="s" placeholder="Search on simplest" />
      </form>
      <nav class="nav-settings">
        <ul>
          <li><a href="#">Gregoire Vella</a></li>
          <li><a href="#" class="icon icon-gear"></a></li>
        </ul>
      </nav>
      <div class="clr"></div>
    </header>
    <div class="container">
      <div class="messages">
        <h1>Inbox <span class="icon icon-arrow-down"></span></h1>
        <form action="">
          <input type="search" class="search" placeholder="Search Inbox" />
        </form>
        <ul class="message-list">
          <li class="new">
            <input type="checkbox" />
            <div class="preview">
              <h3>Sarach Connor <small>Jul 15</small></h3>
              <p><strong>I've been hunted - </strong>A crazing robot ...</p>
            </div>
          </li>
          <li class="active">
            <input type="checkbox" />
            <div class="preview">
              <h3>Jeremy Clarkson <small>Jul 15</small></h3>
              <p>The brand new season of Top Gear</p>
            </div>
          </li>
          <li class="">
            <input type="checkbox" />
            <div class="preview">
              <h3>Eureka.com <small>Jul 14</small></h3>
              <p><strong>Interface design - </strong>Hi Greg ...</p>
            </div>
          </li>
          <li class="">
            <input type="checkbox" />
            <div class="preview">
              <h3>Jeremy Legrand <small>Jul 13</small></h3>
              <p><strong>CSS Responsive - </strong>Here is my hack to ...</p>
            </div>
          </li>
          <li class="">
            <input type="checkbox" />
            <div class="preview">
              <h3>Noe Vella <small>Jul 13</small></h3>
              <p><strong>Personal resume - </strong>Hi Greg, as expected ...</p>
            </div>
          </li>
          <li class="">
            <input type="checkbox" />
            <div class="preview">
              <h3>Dribbble <small>Jul 12</small></h3>
              <p><strong>Thank you for purchaseing a pro account</strong></p>
            </div>
          </li>
          <li class="">
            <input type="checkbox" />
            <div class="preview">
              <h3>Dribbble <small>Jul 12</small></h3>
              <p><strong>Work inquiry from Andy Blast - </strong>the foll...</p>
            </div>
          </li>
          <li class="">
            <input type="checkbox" />
            <div class="preview">
              <h3>Behance <small>Jul 12</small></h3>
              <p><strong>Raj sent you a direct message - </strong></p>
            </div>
          </li>
          <li class="new">
            <input type="checkbox" />
            <div class="preview">
              <h3>Behance <small>Jul 12</small></h3>
              <p><strong>Raj sent you a direct message - </strong></p>
            </div>
          </li>
          <li class="">
            <input type="checkbox" />
            <div class="preview">
              <h3>Dribbble <small>Jul 11</small></h3>
              <p><strong>Peter Avey is now following you - </strong>Hi ...</p>
            </div>
          </li>
        </ul>
      </div>
      <section class="message">
        <h2><span class="icon icon-star-large"></span> The brand new season of Top Gear <span class="icon icon-reply-large"></span><span class="icon icon-delete-large"></span></h2>
        <div class="meta-data">
          <p>
            <img src="http://placehold.it/40x40" class="avatar" alt="" />
            Jeremy Clarkson to <span class="user">me</span>
            <span class="date">July 15, 2013</span>
          </p>
        </div>
        <div class="body">
          <p>Hi Greg,</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam modi possimus dignissimos maxime ipsa unde voluptatum consectetur harum debitis dolorum quas quibusdam vero iusto ducimus blanditiis. Enim autem illo praesentium est quis ab voluptate sequi quia magnam deleniti vero dicta iste. Harum velit asperiores expedita inventore error nulla eius nostrum voluptas aspernatur at quia eaque ipsa deserunt quas doloribus totam incidunt mollitia iure! Libero laudantium nobis necessitatibus veniam autem molestias distinctio voluptas quos aliquam vitae. Consequuntur adipisci natus hic sed rerum dolore cumque numquam illum rem at quaerat reprehenderit iste quis maiores fuga voluptates delectus suscipit dicta nulla itaque placeat.</p>
          <p>Cheers</p>
        </div>
        <div class="action">
          <ul class="options">
            <li><a href="#" class="active">Answering</a></li>
            <li><a href="#">Forward</a></li>
            <div class="clr"></div>
          </ul>
          <div class="textarea">
            <textarea name="r">Hello Jeremy,
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit qui impedit magni fuga velit nobis quas fugit odio voluptas voluptates odit animi quos nam dolorem harum molestiae culpa sint rem ad esse laboriosam vero quod molestias porro ea dolores eligendi!
            </textarea>
            <div class="fileupload mail-container">
              <span class="fileinfo">My file enclosed.pdf</span>
              <div class="progress">
                <div class="bar">65%</div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="/css/mail.css">
@endsection
