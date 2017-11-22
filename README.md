# pinyin
PhalApi 2.x 拼音扩展，基于[overtrue/pinyin](https://github.com/overtrue/pinyin)实现。

## 安装和配置
修改项目下的composer.json文件，并添加：  
```
    "phalapi/pinyin":"dev-master"
```
然后执行```composer update```。  

## 注册
在/path/to/phalapi/config/di.php文件中，注册：  
```php
$di->pinyin = function() {
        return new \PhalApi\Pinyin\Lite();
};
```

## 使用

```php
\PhalApi\DI()->pinyin->convert('带着希望去旅行，比到达终点更美好');
// ["dai", "zhe", "xi", "wang", "qu", "lv", "xing", "bi", "dao", "da", "zhong", "dian", "geng", "mei", "hao"]

\PhalApi\DI()->pinyin->convert('带着希望去旅行，比到达终点更美好', PINYIN_UNICODE);
// ["dài","zhe","xī","wàng","qù","lǚ","xíng","bǐ","dào","dá","zhōng","diǎn","gèng","měi","hǎo"]

\PhalApi\DI()->pinyin->convert('带着希望去旅行，比到达终点更美好', PINYIN_ASCII);
//["dai4","zhe","xi1","wang4","qu4","lv3","xing2","bi3","dao4","da2","zhong1","dian3","geng4","mei3","hao3"]
```

选项：

|      选项      | 描述                                                |
| -------------  | ---------------------------------------------------|
| `PINYIN_NONE`   | 不带音调输出: `mei hao`                           |
| `PINYIN_ASCII`  | 带数字式音调：  `mei3 hao3`                    |
| `PINYIN_UNICODE`  | UNICODE 式音调：`měi hǎo`                    |

### 生成用于链接的拼音字符串

```php
\PhalApi\DI()->pinyin->permalink('带着希望去旅行'); // dai-zhe-xi-wang-qu-lv-xing
\PhalApi\DI()->pinyin->permalink('带着希望去旅行', '.'); // dai.zhe.xi.wang.qu.lv.xing
```

### 获取首字符字符串

```php
\PhalApi\DI()->pinyin->abbr('带着希望去旅行'); // dzxwqlx
\PhalApi\DI()->pinyin->abbr('带着希望去旅行', '-'); // d-z-x-w-q-l-x
```

### 翻译整段文字为拼音

将会保留中文字符：`，。 ！ ？ ： “ ” ‘ ’` 并替换为对应的英文符号。

```php
\PhalApi\DI()->pinyin->sentence('带着希望去旅行，比到达终点更美好！');
// dai zhe xi wang qu lv xing, bi dao da zhong dian geng mei hao!

\PhalApi\DI()->pinyin->sentence('带着希望去旅行，比到达终点更美好！', true);
// dài zhe xī wàng qù lǚ xíng, bǐ dào dá zhōng diǎn gèng měi hǎo!
```

### 翻译姓名

姓名的姓的读音有些与普通字不一样，比如 ‘单’ 常见的音为 `dan`，而作为姓的时候读 `shan`。

```php
\PhalApi\DI()->pinyin->name('单某某'); // ['shan', 'mou', 'mou']
\PhalApi\DI()->pinyin->name('单某某', PINYIN_UNICODE); // ["shàn","mǒu","mǒu"]
```


