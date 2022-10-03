@extends('front_end_helper.default_front_end')
@section('title', 'About')
@section('artikel')

<section class="jumbotron text-center mt-5 my-5">
    <img src="img/Foto.jpg" class="img-fluid mx-auto rounded-circle" style="width: 200px; Height:250px;" alt="Fatur Muhammad">
    <h1 class="display-4">Fatur Muhammad</h1>
    <p class="lead">Beginner Web Designer</p>
</section>

<section id="about">
    <div class="container mb-5 mt-5">
    <div class="row text-center">
        <div class="col-md-12 mb-5 mt-5">
        <h2>About Me</h2>
        </div>
    </div>
        <div class="row justify-content-center">
            <div class="col mb-12">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Illo accusantium commodi nesciunt autem delectus iste voluptate debitis sunt sapiente quidem perspiciatis dicta libero, ipsa aliquid cum id. Sint veritatis aperiam ut reiciendis reprehenderit delectus, 
                    eum quo sed labore eaque magnam a consequuntur harum omnis laboriosam cumque nobis molestiae corrupti, 
                    cum esse. Explicabo veritatis itaque molestias, 
                    laboriosam nulla voluptates atque blanditiis eligendi consequatur quos perspiciatis recusandae aspernatur animi ipsam qui quam iusto dignissimos culpa. 
                    Quos illo dolores labore eveniet ipsam, unde deserunt beatae atque asperiores, 
                    culpa eaque totam officia natus perferendis omnis rerum facilis, 
                    incidunt excepturi ipsa dignissimos! Voluptas, nisi natus!
                </p>
            </div>
            
            <div class="col mb-12">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Incidunt possimus necessitatibus harum repellendus perferendis illum, 
                    itaque nulla architecto, quasi odit est nihil vel omnis autem, animi labore sint molestiae dolorum in eius sunt quae nostrum. 
                    Rerum quibusdam explicabo placeat sed ut sint ab tempora veniam aliquam maxime, 
                    quas fugit ipsam nam ex soluta nemo quos consequatur! Deserunt repellat aliquid, 
                    asperiores quam voluptatem explicabo! Ullam et quis aperiam, nobis sapiente ad. 
                    Quos eos ipsa, et temporibus, quod id dolorum perspiciatis inventore nisi, 
                    quia quaerat expedita explicabo animi fugit iste consequatur quis corrupti porro officiis sint recusandae dolore quam. Maxime, itaque omnis?
                </p>
            </div>
        </div>
    </div>
</section>

<section id="project">
    <div class="container mb-5 mt-5">
    <div class="row text-center">
        <div class="col-md-12 mb-5 mt-5">
        <h2>My Projects</h2>
        </div>
    </div>
        <div class="row justify-content-center mb-5">
        <div class="col-md-4 mb-5 mt-5">
            <div class="card">
                <img src="SS/caseinsensitive.jpg" alt="" class="card-img-top">
                <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet.</p>
            </div>
            </div>
        </div>
        <div class="col-md-4 mb-5 mt-5">
            <div class="card">
                <img src="SS/caseinsensitive.jpg" alt="" class="card-img-top">
                <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet.</p>
            </div>
            </div>
        </div>
        <div class="col-md-4 mb-5 mt-5">
            <div class="card">
                <img src="SS/caseinsensitive.jpg" alt="" class="card-img-top">
                <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet.</p>
            </div>
            </div>
        </div>
        <div class="col-md-4 mb-5 mt-5">
            <div class="card">
                <img src="SS/caseinsensitive.jpg" alt="" class="card-img-top">
                <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet.</p>
            </div>
            </div>
        </div>
        <div class="col-md-4 mb-5 mt-5">
            <div class="card">
                <img src="SS/caseinsensitive.jpg" alt="" class="card-img-top">
                <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet.</p>
            </div>
            </div>
        </div>
        <div class="col-md-4 mb-5 mt-5">
            <div class="card">
                <img src="SS/caseinsensitive.jpg" alt="" class="card-img-top">
                <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet.</p>
            </div>
            </div>
        </div>
        </div>
</div>
</section>

{{-- <section id="contact">
    <div class="container">
    <div class="row text-center">
        <div class="col-md-12">
        <h2>Contact Me</h2>
        </div>
    </div>
        <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <form method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" cols="30" rows="10" name="message"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="add_contact">Send Message</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section> --}}

@endsection