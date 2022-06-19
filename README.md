## この環境の使い方

Dockerイメージをビルドして起動する

```
docker-compose up --build
```

## アプケーションにアクセスする

http://localhost:5000


## php myadminにアクセスする

http://localhost:5001

## db

dataフォルダの消し方

```
cd db
docker run --rm -v $(pwd):/app -w /app alpine rm -rf data
```
