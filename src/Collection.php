<?php

namespace Google;

/**
 * Extension to the regular Google\Model that automatically
 * exposes the items array for iteration, so you can just
 * iterate over the object rather than a reference inside.
 */
class Collection extends Model implements \Iterator, \Countable
{
  protected $collection_key = 'items';

  /** @return void */
  #[\ReturnTypeWillChange]
  public function rewind()
  {
    if (isset($this->{$this->collection_key})
        && is_array($this->{$this->collection_key})) {
      reset($this->{$this->collection_key});
    }
  }

  /** @return mixed */
  #[\ReturnTypeWillChange]
  public function current()
  {
    $this->coerceType($this->key());
    if (is_array($this->{$this->collection_key})) {
      return current($this->{$this->collection_key});
    }
  }

  /** @return mixed */
  #[\ReturnTypeWillChange]
  public function key()
  {
    if (isset($this->{$this->collection_key})
        && is_array($this->{$this->collection_key})) {
      return key($this->{$this->collection_key});
    }
  }

  /** @return void */
  #[\ReturnTypeWillChange]
  public function next()
  {
    return next($this->{$this->collection_key});
  }

  /** @return bool */
  #[\ReturnTypeWillChange]
  public function valid()
  {
    $key = $this->key();
    return $key !== null && $key !== false;
  }

  /** @return int */
  #[\ReturnTypeWillChange]
  public function count()
  {
    if (!isset($this->{$this->collection_key})) {
      return 0;
    }
    return count($this->{$this->collection_key});
  }

  /** @return bool */
  public function offsetExists($offset)
  {
    if (!is_numeric($offset)) {
      return parent::offsetExists($offset);
    }
    return isset($this->{$this->collection_key}[$offset]);
  }

  /** @return mixed */
  public function offsetGet($offset)
  {
    if (!is_numeric($offset)) {
      return parent::offsetGet($offset);
    }
    $this->coerceType($offset);
    return $this->{$this->collection_key}[$offset];
  }

  /** @return void */
  public function offsetSet($offset, $value)
  {
    if (!is_numeric($offset)) {
      parent::offsetSet($offset, $value);
    }
    $this->{$this->collection_key}[$offset] = $value;
  }

  /** @return void */
  public function offsetUnset($offset)
  {
    if (!is_numeric($offset)) {
      parent::offsetUnset($offset);
    }
    unset($this->{$this->collection_key}[$offset]);
  }

  private function coerceType($offset)
  {
    $keyType = $this->keyType($this->collection_key);
    if ($keyType && !is_object($this->{$this->collection_key}[$offset])) {
      $this->{$this->collection_key}[$offset] =
          new $keyType($this->{$this->collection_key}[$offset]);
    }
  }
}
