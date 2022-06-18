## db

dataが消せなくなった時のトラブルシュート

```
cd data
docker run --rm -v $(pwd):/app -w /app alpine rm -rf data
```
