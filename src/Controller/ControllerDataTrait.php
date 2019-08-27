<?php
namespace Controller;

trait ControllerDataTrait {

    /**
     * @return array
     */
    public function getData(): array {
        return $this->view->data;
    }

    /**
     * @param array $data
     *
     * @return ControllerDataTrait
     */
    public function setData(array $data): self {
        $this->view->data = $data;

        return $this;
    }

    /**
     * @param string $key
     * @param $value
     *
     * @return array
     */
    public function addData(string $key, $value): array {
        $this->view->data[$key] = $value;

        return $this->view->data;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasData(string $key): bool {
        return \array_key_exists($key, $this->view->data);
    }
}