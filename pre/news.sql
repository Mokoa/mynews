#新闻频道(头条,财经,体育,娱乐,军事,教育,科技,NBA,股票,星座,女性,健康,育儿)

-- 创建新闻表
CREATE TABLE news(
    newsID INT(11) AUTO_INCREMENT,
    title VARCHAR(50),
    channel VARCHAR(20),
    time VARCHAR(20),
    src VARCHAR(100),
    category VARCHAR(50),
    pic VARCHAR(100),
    content TEXT,
    url VARCHAR(100),
    weburl VARCHAR(100),
    clicks INT DEFAULT 0,
    PRIMARY KEY(newsID)
);