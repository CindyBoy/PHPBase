
<?php

trait t {
  protected $p;
  public function testMe() {echo 'static:'.static::class. ' // self:'.self::class ."\n";}
}

class a { use t; }
class b extends a {}

echo (new a)->testMe();
echo (new b)->testMe();

// outputs
// static:a // self:t
// static:b // self:t
