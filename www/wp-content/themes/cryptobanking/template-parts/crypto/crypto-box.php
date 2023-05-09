    <div class="promo__rate" style="display: none;">
      <div class="promo__rate-list">
        <div class="promo__rate-card rate-card btc" style="display: none;">
          <div class="rate-card__header">
            <img
              class="rate-card__icon"
              src="<?= get_template_directory_uri() ?>/assets/icons/bitcoin.png"
              alt="BTC"
            />
            <div class="rate-card__name">BTC</div>
            <div class="rate-card__dynamics rate-card__dynamics--positive">
              +4.79%
            </div>
          </div>
          <div class="rate-card__values">
            <div class="rate-card__value rub">₽ 727,355.28</div>
            <div class="rate-card__value usd">$ 9771.05</div>
          </div>
        </div>

        <div class="promo__rate-card rate-card eth" style="display: none;">
          <div class="rate-card__header">
            <img class="rate-card__icon" src="<?= get_template_directory_uri() ?>/assets/icons/eth.png" alt="ETH" />
            <div class="rate-card__name">ETH</div>
            <div class="rate-card__dynamics rate-card__dynamics--positive">
              +8.01%
            </div>
          </div>
          <div class="rate-card__values">
            <div class="rate-card__value">₽ 23,364.49</div>
            <div class="rate-card__value">$ 313.86</div>
          </div>
        </div>
          
        <div class="promo__rate-card rate-card usdt" style="display: none;">
          <div class="rate-card__header">
            <img
              class="rate-card__icon"
              src="<?= get_template_directory_uri() ?>/assets/icons/tether.png"
              alt="USDT"
            />
            <div class="rate-card__name">USDT</div>
            <div class="rate-card__dynamics rate-card__dynamics--negative">
              -0.38%
            </div>
          </div>
          <div class="rate-card__values">
            <div class="rate-card__value">₽ 71,79</div>
            <div class="rate-card__value">$ 0.96</div>
          </div>
        </div>
      </div>
    </div>


<script type='text/javascript'>
    let api_url = "<?= get_option('service-api')?>";
    $.get(api_url, [], function(data){
        for(key in data) {
            $item = $('.promo__rate-card.rate-card.'+key);
            $('.rate-card__value.rub', $item).text('₽ '+data[key].rub);
            $('.rate-card__value.usd', $item).text('$ '+data[key].usd);
            $percent = $('.rate-card__dynamics');
            if (data[key].dynamics < 0) {
                $percent.addClass('promo__crypto-percent--negative');
            } else {
                $percent.addClass('promo__crypto-percent--positive');
            }
            $percent.text(data[key].dynamics + " %");
            $item.show();
        }
        $('.promo__rate').show();
        
    });
</script>