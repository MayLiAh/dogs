<?php

/**
 * Класс для работы с шаблонами:
 * производит подключение к шаблону и передачу данных в него, формирует итоговый html-код
 * 
 * Пример использования:
 * $template = new Template('file.php', ['content' => $content]);
 * $templateContent = $template->getContent();
 */
class Template
{
    /**
     * Переменные для хранения пути к файлу и массива с данными для передачи в шаблон
     */
    private $way;
    private $data;

    /**
     * Функция-коструктор, присваивающая переменным $way, $data строку - путь к файлу
     *                                       и массив с данными для передачи в шаблон
     * @param string $way Путь к файлу шаблона
     * @param array $data Массив с данными для передачи в шаблон
     * 
     * @return void Функция ничего не возвращает
     */
    public function __construct($way, $data)
    {
        $this->way = $way;
        $this->data = $data;
    }

    /**
     * Подключает шаблон, передает в него данные из массива $data и возвращает готовый html-код
     * 
     * @return string Готовый html-код
     */
    public function getContent()
    {
        $result = $this->way;

        if (!is_readable($this->way)) {
            return $result;
        }

        ob_start();
        extract($this->data);
        require $this->way;

        $result = ob_get_clean();

        return $result;
    }
}