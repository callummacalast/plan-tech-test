import { useRef } from 'react'
import { BaseVideo, CardProps } from './types'
import { PreviewMode } from '../../../constants/enums'
import useVideoControls from '../../../hooks/useVideoControls'
import { Button } from '../../atoms/Button'
import pauseIcon from '../../../assets/icons/pause.svg'
import playIcon from '../../../assets/icons/play.svg'
import muteIcon from '../../../assets/icons/audio-mute.svg'
import unmuteIcon from '../../../assets/icons/audio-playing.svg'
import { Input } from '../../atoms/Input'

const Card = <T extends BaseVideo>({
  data,
  previewMode,
  onVideoStart,
  onVideoEnd,
  onVideoResume,
  onVideoSeek,
}: CardProps<T>) => {
  const videoRef = useRef<HTMLVideoElement>(null)

  const {
    isHovered,
    isPlaying,
    isMute,
    handleMouseEnter,
    handleMouseLeave,
    togglePlay,
    toggleAudio,
    handleSeek,
    currentTime,
    setCurrentTime,
    setDuration,
  } = useVideoControls(videoRef)

  return (
    <div
      className={`p-2 ${
        previewMode === PreviewMode.STATIC ? '' : 'cursor-pointer'
      }`}
    >
      <div className="space-y-4">
        <div
          className={`relative w-full aspect-video overflow-hidden ${
            isHovered && previewMode === PreviewMode.INTERACTIVE
              ? ''
              : 'rounded-lg'
          } cursor-pointer`}
          onMouseEnter={handleMouseEnter}
          onMouseLeave={handleMouseLeave}
        >
          {previewMode === PreviewMode.STATIC || !isHovered ? (
            <img
              src={data.thumbnail_url}
              alt={data.title}
              className={`absolute inset-0 w-full h-full object-cover transitionease-in-out transition-opacity duration-500 ${
                isHovered ? 'opacity-0' : 'opacity-100'
              }`}
            />
          ) : (
            <video
              ref={videoRef}
              onTimeUpdate={(e: React.ChangeEvent<HTMLVideoElement>) =>
                setCurrentTime(e.target.currentTime)
              }
              onLoadedMetadata={(e: React.ChangeEvent<HTMLVideoElement>) =>
                setDuration(e.target.duration)
              }
              onEnded={onVideoEnd != null ? () => onVideoEnd() : undefined}
              onPlay={onVideoStart != null ? () => onVideoStart() : undefined}
              onPause={
                onVideoResume != null ? () => onVideoResume() : undefined
              }
              onSeeking={onVideoSeek != null ? () => onVideoSeek() : undefined}
              className={`w-full h-full transition-opacity duration-300 ${
                isHovered ? 'opacity-100' : 'opacity-0'
              }`}
              muted
              preload="metadata"
            >
              <source src={data.video_url} type="video/mp4" />
            </video>
          )}

          {previewMode === PreviewMode.INTERACTIVE && isHovered && (
            <div className="flex flex-col justify-end absolute gap-3 h-full  w-full p-1 bottom-0">
              <div className="flex flex-col justify-center gap-3">
                <Button
                  type="button"
                  className=" bg-black/60 text-white  rounded-full h-10 w-10 flex items-center justify-center cursor-pointer"
                  onClick={togglePlay}
                >
                  {isPlaying ? (
                    <img src={pauseIcon} alt="Pause" className="w-5 h-5" />
                  ) : (
                    <img src={playIcon} alt="Play" className="w-5 h-5" />
                  )}
                </Button>
                <Button
                  type="button"
                  className="bg-black/60 text-white  rounded-full h-10 w-10 flex items-center justify-center cursor-pointer"
                  onClick={toggleAudio}
                >
                  {isMute ? (
                    <img src={muteIcon} alt="Pause" className="w-5 h-5" />
                  ) : (
                    <img src={unmuteIcon} alt="Pause" className="w-5 h-5" />
                  )}
                </Button>
              </div>
              <Input
                type="range"
                min="0"
                step="1"
                max={data.duration}
                value={currentTime}
                onChange={handleSeek}
                className="w-full "
              />
            </div>
          )}
        </div>

        <div className="flex gap-3">
          <div className="rounded-full shadow bg-gray-100 flex-shrink-0 h-10 w-10"></div>
          <div>
            <h3 className="text-md font-semibold text-yellow-600">
              {data.title}
            </h3>
            <p className="text-sm">{data.author}</p>
            <p className="flex gap-2 text-sm">
              <span>{data.views}</span> | <span>{data.uploaded_at}</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  )
}

export default Card
