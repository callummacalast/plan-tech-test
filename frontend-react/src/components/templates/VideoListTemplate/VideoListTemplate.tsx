import { Header } from '../../organisms/Header'
import { Footer } from '../../organisms/Footer'
import { VideoListTemplateProps } from './types'
import { Grid } from '../../organisms/Grid'
import { useVideos } from '../../../hooks/useVideos'
import { VideoCard } from '../../organisms/VideoCard'
import { SkeletonCard } from '../../molecules/Card'

const VideoListTemplate = ({ videos }: VideoListTemplateProps) => {
  const { isLoading, error } = useVideos()
  const emptyState: number[] = [1, 2, 3, 4]

  const shouldShowEmptyState = !isLoading && videos && videos.length === 0

  return (
    <>
      <Header />
      <main className="container mx-auto ">
        {error && (
          <div className="flex items-center justify-center h-screen font-bold text-2xl text-center">
            {error}
          </div>
        )}

        {isLoading || !videos && !error ? (
          <Grid>
            {emptyState.map((_) => (
              <SkeletonCard key={_} />
            ))}
          </Grid>
        ) : (
          <Grid>
            {videos?.map((video) => (
              <VideoCard key={video.id} video={video} />
            ))}
          </Grid>
        )}

        {shouldShowEmptyState && (
          <div className="h-screen flex items-center justify-center col-span-full text-2xl text-center">
            There were no videos found
          </div>
        )}
      </main>
      <Footer />
    </>
  )
}

export default VideoListTemplate
