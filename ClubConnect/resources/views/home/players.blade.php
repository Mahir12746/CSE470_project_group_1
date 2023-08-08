<section class="artists-section section-padding" id="section_3">
        <!-- START -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="Ticket-Text">Top 3 Players</h2>
            </div>
            <div class="row">
          @foreach($players->take(3) as $player)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
              <div class="card">
                <img src="/player_images/{{ $player->pimage }}" class="card-img-top" alt="{{ $player->name }} Image">
                <div class="card-body">
                  <h5 class="card-title">
                    <strong class="rank-text"> Rank {{ $player->rank }}</strong>
                    <span class="player-name">{{ $player->name }}</span>
                  </h5>
                  <p class="card-text"><strong>Club:</strong> {{ $player->club }}</p>
                  <p class="card-text"><strong>Age:</strong> {{ $player->age }}</p>
                  <p class="card-text"><strong>Position:</strong> {{ $player->position }}</p>
                  <p class="card-text"><strong>Goals:</strong> {{ $player->goals }}</p>
                  <p class="card-text"><strong>Assists:</strong> {{ $player->assists }}</p>
                  <p class="card-text"><strong>Minutes Played:</strong> {{ $player->minsplayed }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        </div>
        <!-- END -->
      </div>
        </section>