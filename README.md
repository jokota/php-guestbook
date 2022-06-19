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

dataが消せなくなった時のトラブルシュート

```
cd data
docker run --rm -v $(pwd):/app -w /app alpine rm -rf data
```
